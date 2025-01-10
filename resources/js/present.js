import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const chatList = document.getElementById("chatList");
    const chatHeader = document.getElementById("chatHeader");
    const messageContainer = document.getElementById("messageContainer");
    const messageInput = document.getElementById("messageInput");
    const sendButton = document.getElementById("sendButton");

    let currentRoomId = null;
    let currentRecipientId = null;
    const unreadMessages = {};

    // Lấy danh sách phòng chat từ server
    async function loadChatRooms() {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/tin-nhan");
            const rooms = await response.json();
            console.log("🚀 ~ loadChatRooms ~ rooms:", rooms);

            if (rooms.tin_nhans && Array.isArray(rooms.tin_nhans)) {
                await subscribeToAllRooms();

                // Lọc các phòng chat mà người dùng tham gia
                const userRooms = rooms.tin_nhans.filter(
                    (message) =>
                        message.nguoi_gui.id === authUserId ||
                        message.nguoi_nhan.id === authUserId
                );

                // Dùng Set để nhóm các tin nhắn theo phòng chat
                const uniqueRoomsMap = new Map();
                userRooms.forEach((message) => {
                    const roomId = message.phong_chat_id;

                    if (!uniqueRoomsMap.has(roomId)) {
                        uniqueRoomsMap.set(roomId, {
                            phong_chat_id: roomId,
                            nguoi_gui: message.nguoi_gui,
                            nguoi_nhan: message.nguoi_nhan,
                            messages: [],
                        });
                    }
                    uniqueRoomsMap.get(roomId).messages.push(message);
                });

                const uniqueRooms = Array.from(uniqueRoomsMap.values());

                const chatList = document.getElementById("chatList");
                if (chatList) {
                    chatList.innerHTML = "";

                    uniqueRooms.forEach((room) => {
                        const otherUser =
                            room.nguoi_gui.id === authUserId
                                ? room.nguoi_nhan
                                : room.nguoi_gui;

                        const unreadCount = room.messages.filter(
                            (message) =>
                                message.trang_thai === "chua_xem" &&
                                message.nguoi_gui.id !== authUserId
                        ).length;

                        chatList.innerHTML += `
                            <li class="chat-user d-flex align-items-center mb-3" data-room-id="${
                                room.phong_chat_id
                            }">
                                <img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="rounded-circle" width="40px" height="40px">
                                <span class="ms-2">${otherUser.ten}</span>
                                <span class="badge bg-danger ms-auto unread-count" data-room-id="${
                                    room.phong_chat_id
                                }"
                                    style="${
                                        unreadCount
                                            ? "display: inline-block;"
                                            : "display: none;"
                                    }">
                                    ${unreadCount}
                                </span>
                            </li>
                        `;
                    });

                    if (uniqueRooms.length === 0) {
                        chatList.innerHTML = "<li>Không có phòng chat nào</li>";
                    }
                } else {
                    console.error("Element with id 'chatList' not found");
                }
            } else {
                console.error("Invalid response format");
            }
        } catch (error) {
            console.error("Error loading chat rooms:", error);
        }
    }

    // Tải tin nhắn của phòng chat
    async function loadMessages(roomId) {
        // Tải tin nhắn ban đầu từ API
        const response = await fetch(
            `http://127.0.0.1:8000/api/tin-nhan/${roomId}`
        );
        const messages = await response.json();
        console.log("🚀 ~ loadMessages ~ messages:", messages);

        messageContainer.innerHTML = messages
            .map((msg) => {
                const isCurrentUser = msg.nguoi_gui.id === authUserId;

                return `
                    <div class="message ${isCurrentUser ? "you" : "user1"}">
                        ${
                            !isCurrentUser
                                ? `<img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="avatar">`
                                : ""
                        }
                        <p>${msg.tin_nhan}</p>
                    </div>
                `;
            })
            .join("");

        // // Lắng nghe sự kiện thời gian thực từ phòng chat
        // window.Echo.leaveChannel(`chat.${currentRoomId}`);
        // window.Echo.channel(`chat.${roomId}`).listen(".new-message", (e) => {
        //     console.log("New message received:", e.message);

        //     // Cập nhật giao diện với tin nhắn mới
        //     messageContainer.innerHTML += `
        //         <div class="message ${
        //             e.message.nguoi_gui.id === authUserId ? "you" : "user1"
        //         }">
        //             ${
        //                 e.message.nguoi_gui.id !== authUserId
        //                     ? `<img src="${e.message.nguoi_gui.anh_dai_dien}" alt="User Avatar" class="avatar">`
        //                     : ""
        //             }
        //             <p>${e.message.tin_nhan}</p>
        //         </div>
        //     `;
        //     // Cuộn xuống tin nhắn mới nhất
        //     messageContainer.scrollTop = messageContainer.scrollHeight;
        // });
    }

    async function subscribeToAllRooms() {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/tin-nhan");
            const rooms = await response.json();

            if (rooms.tin_nhans && Array.isArray(rooms.tin_nhans)) {
                const userRooms = rooms.tin_nhans.filter(
                    (room) =>
                        room.nguoi_gui.id === authUserId ||
                        room.nguoi_nhan.id === authUserId
                );

                const roomIds = new Set(
                    userRooms.map((room) => room.phong_chat_id)
                );

                roomIds.forEach((roomId) => {
                    window.Echo.channel(`chat.${roomId}`).listen(
                        ".new-message",
                        (e) => {
                            if (e.message.nguoi_nhan === authUserId) {
                                // Nếu phòng chat hiện tại không được mở, tăng số lượng tin nhắn chưa đọc
                                if (currentRoomId !== roomId) {
                                    if (!unreadMessages[roomId]) {
                                        unreadMessages[roomId] = 0;
                                    }
                                    unreadMessages[roomId]++;

                                    // Cập nhật badge trên danh sách phòng chat
                                    const unreadBadge = document.querySelector(
                                        `.unread-count[data-room-id="${roomId}"]`
                                    );
                                    if (unreadBadge) {
                                        unreadBadge.textContent =
                                            unreadMessages[roomId];
                                        unreadBadge.style.display =
                                            "inline-block";
                                    }

                                    incrementNotificationBadge();
                                } else {
                                    messageContainer.innerHTML += `
                                    <div class="message ${
                                        e.message.nguoi_gui === authUserId
                                            ? "you"
                                            : "user1"
                                    }">
                                        ${
                                            e.message.nguoi_gui !== authUserId
                                                ? `<img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="avatar">`
                                                : ""
                                        }
                                        <p>${e.message.tin_nhan}</p>
                                    </div>
                                `;
                                    messageContainer.scrollTop =
                                        messageContainer.scrollHeight;
                                }
                            }
                        }
                    );
                });
            }
        } catch (error) {
            console.error("Error subscribing to all rooms:", error);
        }
    }

    // Cập nhật tiêu đề của phòng chat
    async function updateChatHeader(roomId) {
        try {
            const response = await fetch(
                `http://127.0.0.1:8000/api/tin-nhan/${roomId}`
            );
            const rooms = await response.json();

            console.log("🚀 ~ updateChatHeader ~ rooms:", rooms);

            // Kiểm tra xem mảng có ít nhất một phòng chat không
            if (rooms.length === 0) {
                console.error("No rooms found");
                return;
            }

            const room = rooms[0];

            currentRecipientId = room.nguoi_gui.id;

            // Kiểm tra nếu currentRecipientId là authUserId
            if (currentRecipientId === authUserId) {
                // Nếu đúng, chuyển currentRecipientId thành room.nguoi_nhan.id
                currentRecipientId = room.nguoi_nhan.id;
            } else {
                // Nếu không giống nhau, giữ nguyên currentRecipientId
                currentRecipientId = room.nguoi_gui.id;
            }

            // Xác định người dùng khác (otherUser)
            const otherUser =
                room.nguoi_gui.id === authUserId
                    ? room.nguoi_nhan
                    : room.nguoi_gui;

            function updateUserStatus(userId, isOnline) {
                const userElement = document.querySelector(
                    `.user-status[data-user-id="${userId}"]`
                );
                if (userElement) {
                    userElement.textContent = isOnline
                        ? "Đang trong phòng"
                        : "Offline";
                    userElement.classList.toggle("Đang trong phòng", isOnline);
                }
            }

            // Cập nhật giao diện tiêu đề chat
            const chatHeader = document.querySelector(".chat-header");
            if (chatHeader) {
                chatHeader.innerHTML = `
                    <img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="avatar">
                    <div class="user-info">
                        <p class="user-name">${otherUser.ten}</p>
                        <p class="user-status" data-user-id="${otherUser.id}">Đang không trong phòng chat</p>

                    </div>
                `;
            } else {
                console.error("Chat header element not found");
                return;
            }

            // Lắng nghe sự kiện người dùng online/offline
            Echo.join("presence-online-users")
                .here((users) => {
                    console.log("Users currently online:", users);

                    // Cập nhật giao diện hiển thị danh sách người dùng online
                    users.forEach((user) => {
                        updateUserStatus(user.id, true); // Hàm tùy chỉnh hiển thị trạng thái
                    });
                })
                .joining((user) => {
                    console.log(`${user.name} has joined.`);
                    updateUserStatus(user.id, true); // Cập nhật trạng thái thành "Online"
                })
                .leaving((user) => {
                    console.log(`${user.name} has left.`);
                    updateUserStatus(user.id, false); // Cập nhật trạng thái thành "Offline"
                });
        } catch (error) {
            console.error("Error in updateChatHeader:", error);
        }
    }
    async function markMessagesAsRead(phongChatId) {
        try {
            const response = await fetch(
                `http://127.0.0.1:8000/api/tin-nhan/${phongChatId}/read`,
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                }
            );

            if (!response.ok) {
                throw new Error("Failed to mark messages as read");
            }

            console.log(`Messages in room ${phongChatId} marked as read`);
        } catch (error) {
            console.error("Error marking messages as read:", error);
        }
    }

    // Xử lý khi click vào phòng chat
    chatList.addEventListener("click", async (e) => {
        const roomElement = e.target.closest(".chat-user");

        if (roomElement) {
            const roomId = roomElement.getAttribute("data-room-id");
            currentRoomId = roomId;
            console.log(currentRoomId, roomId);

            // Cập nhật tiêu đề phòng chat và tải tin nhắn ban đầu
            await updateChatHeader(roomId);
            await loadMessages(roomId);

            // Lắng nghe sự kiện thời gian thực từ phòng
            window.Echo.leaveChannel(`chat.${currentRoomId}`);
            window.Echo.channel(`chat.${roomId}`).listen(
                ".new-message",
                (e) => {
                    messageContainer.innerHTML += `
                    <div class="message ${
                        e.message.nguoi_gui === authUserId ? "you" : "user1"
                    }">
                        ${
                            e.message.nguoi_gui !== authUserId
                                ? `<img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="avatar">`
                                : ""
                        }
                        <p>${e.message.tin_nhan}</p>
                    </div>
                `;
                    if (e.message.nguoi_nhan === authUserId) {
                        // Tăng số tin nhắn chưa đọc cho phòng chat tương ứng
                        const roomId = e.message.phong_chat_id;
                        if (!unreadMessages[roomId]) {
                            unreadMessages[roomId] = 0;
                        }
                        unreadMessages[roomId]++;

                        // Hiển thị số tin nhắn chưa đọc trên danh sách phòng
                        const unreadBadge = document.querySelector(
                            `.unread-count[data-room-id="${roomId}"]`
                        );
                        if (unreadBadge) {
                            unreadBadge.textContent = unreadMessages[roomId];
                            unreadBadge.style.display = "inline-block";
                        }

                        // Thông báo tin nhắn mới
                        incrementNotificationBadge();
                    }
                    // Cuộn xuống tin nhắn mới nhất
                    messageContainer.scrollTop = messageContainer.scrollHeight;
                }
            );
        }
    });

    let unreadCount = 0;

    function incrementNotificationBadge() {
        unreadCount = Object.values(unreadMessages).reduce(
            (sum, count) => sum + count,
            0
        );
        const badge = document.getElementById("notificationBadge");
        const unreadCountElement = document.getElementById("unreadCount");

        unreadCountElement.textContent = unreadCount;
        badge.classList.toggle("d-none", unreadCount === 0);
    }
    +(messageInput.addEventListener("click", async () => {
        if (currentRoomId) {
            // Đặt số lượng tin nhắn chưa đọc của phòng hiện tại về 0
            unreadMessages[currentRoomId] = 0;

            // Ẩn thông báo chưa đọc của phòng
            const unreadBadge = document.querySelector(
                `.unread-count[data-room-id="${currentRoomId}"]`
            );
            if (unreadBadge) {
                unreadBadge.textContent = "0";
                unreadBadge.style.display = "none";
            }

            // Cập nhật tổng số thông báo chưa đọc
            incrementNotificationBadge();

            await markMessagesAsRead(currentRoomId);
        }
    }),
    // Gửi tin nhắn
    sendButton.addEventListener("click", async () => {
        const messageInput = document.getElementById("messageInput");
        const message = messageInput.value.trim();

        if (message && currentRoomId && currentRecipientId && authUserId) {
            try {
                // Gửi yêu cầu POST lên server để tạo tin nhắn bằng Axios
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/send-message",
                    {
                        tin_nhan: message, // Tin nhắn
                        nguoi_gui: authUserId,
                        nguoi_nhan: currentRecipientId,
                        phong_chat_id: currentRoomId,
                    }
                );

                messageInput.value = "";
            } catch (error) {
                console.error(
                    "Lỗi khi gửi tin nhắn:",
                    error.response || error.message
                );
            }
        } else {
            console.error("Vui lòng nhập tin nhắn và chọn người nhận.");
        }
    }));

    // Khởi tạo
    loadChatRooms();
});

function toggleChatbox() {
    const chatboxBody = document.querySelector(".chatbox-body");
    const toggleIcon = document.getElementById("toggleIcon");

    // Nếu chatbox đang đóng (hoặc chưa được hiển thị), mở nó
    if (chatboxBody.style.display === "none" || !chatboxBody.style.display) {
        chatboxBody.style.display = "block";
        toggleIcon.classList.remove("fa-chevron-up");
        toggleIcon.classList.add("fa-chevron-down");
    }
}

function handleRoomClick(phongChatId, tenNguoiNhan) {
    const roomElement = document.querySelector(
        `.chat-user[data-room-id="${phongChatId}"]`
    );

    if (roomElement) {
        roomElement.click();
    } else {
        const chatList = document.getElementById("chatList");
        const newRoomElement = document.createElement("li");
        newRoomElement.className = "chat-user d-flex align-items-center mb-3";
        newRoomElement.setAttribute("data-room-id", phongChatId);
        newRoomElement.innerHTML = `
            <img src="/assets/images/avatar/avt-6.jpg" alt="User Avatar" class="rounded-circle" width="40px" height="40px">
            <span class="ms-2">${tenNguoiNhan}</span>
            <span class="badge bg-danger ms-auto unread-count" data-room-id="${phongChatId}" style="display: none;">0</span>
        `;

        chatList.appendChild(newRoomElement);
        newRoomElement.click();
    }
}

Echo.channel("lich-su-thue-channel").listen(".lich-su-thue.updated", (data) => {
    const { lichSuThue } = data;

    if (lichSuThue) {
        const chatboxBody = document.querySelector(".chatbox-body");
        const toggleIcon = document.getElementById("toggleIcon");

        // Mở khung chat nếu đang đóng
        if (
            chatboxBody.style.display === "none" ||
            !chatboxBody.style.display
        ) {
            chatboxBody.style.display = "block";
            toggleIcon.classList.remove("fa-chevron-up");
            toggleIcon.classList.add("fa-chevron-down");
        }

        // Hiển thị thông tin đơn thuê mới trong chatHeader
        const chatHeader = document.getElementById("chatHeader");
        chatHeader.innerHTML = `
    <div class="d-flex align-items-center chat-header-container">
        <img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="avatar">
        <div class="ms-2">
            <p class="user-name">Đơn thuê mới</p>
            <p class="user-status">Người thuê: ${lichSuThue.nguoi_thue.ten}</p>
            <p class="user-status">Thời gian thuê: ${
                lichSuThue.gio_thue
            } giờ</p>
            <p class="user-status">Giá thuê: ${lichSuThue.gia_thue.toLocaleString()} VNĐ</p>
            <div class="button-group">
                <button class="btn accept-btn" id="acceptBtn">Chấp nhận</button>
                <button class="btn reject-btn" id="rejectBtn">Từ chối</button>
            </div>
        </div>
    </div>
`;

        // Thêm sự kiện click cho nút Chấp nhận và Từ chối
        document.getElementById("acceptBtn").addEventListener("click", () => {
            console.log("Đã chấp nhận đơn thuê.");
            // Thêm logic xử lý cho nút Chấp nhận
        });

        document.getElementById("rejectBtn").addEventListener("click", () => {
            console.log("Đã từ chối đơn thuê.");
            // Thêm logic xử lý cho nút Từ chối
        });
    }
});

document
    .getElementById("messageInput")
    .addEventListener("keydown", function (event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault(); // Ngừng hành động mặc định của phím Enter (xuống dòng)
            document.getElementById("sendButton").click(); // Gửi tin nhắn
        }
    });
