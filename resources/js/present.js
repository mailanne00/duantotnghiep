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

            // Kiểm tra nếu dữ liệu hợp lệ
            if (rooms.tin_nhans && Array.isArray(rooms.tin_nhans)) {
                // Lọc các phòng mà người dùng hiện tại tham gia
                await subscribeToAllRooms();
                const userRooms = rooms.tin_nhans.filter(
                    (room) =>
                        room.nguoi_gui.id === authUserId ||
                        room.nguoi_nhan.id === authUserId
                );

                // Dùng Set để loại bỏ phòng trùng lặp dựa trên phong_chat_id
                const uniqueRooms = [];
                const roomIds = new Set();

                userRooms.forEach((room) => {
                    if (!roomIds.has(room.phong_chat_id)) {
                        roomIds.add(room.phong_chat_id);
                        uniqueRooms.push(room);
                    }
                });

                // Đảm bảo rằng phần tử chatList đã được lấy
                const chatList = document.getElementById("chatList");
                if (chatList) {
                    chatList.innerHTML = ""; // Xóa nội dung cũ

                    // Duyệt qua các phòng hợp lệ và thêm vào danh sách

                    uniqueRooms.forEach((room) => {
                        // Kiểm tra nếu người gửi là authUserId, thì đối phương là nguoi_nhan, ngược lại là nguoi_gui
                        const otherUser =
                            room.nguoi_gui.id === authUserId
                                ? room.nguoi_nhan
                                : room.nguoi_gui;

                        // Thêm phòng chat vào danh sách và luôn hiển thị tên của đối phương
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
                        unreadMessages[room.phong_chat_id]
                            ? "display: inline-block;"
                            : "display: none;"
                    }">
                    ${unreadMessages[room.phong_chat_id] || 0}
                </span>
                        </li>
                    `;
                    });
                    unreadMessages[roomId] = 0;
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

        // Hiển thị tin nhắn đã tải từ API
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

    function toggleChatbox() {
        const chatboxBody = document.querySelector(".chatbox-body");
        const toggleIcon = document.getElementById("toggleIcon");

        // Nếu chatbox đang đóng (hoặc chưa được hiển thị), mở nó
        if (
            chatboxBody.style.display === "none" ||
            !chatboxBody.style.display
        ) {
            chatboxBody.style.display = "block";
            toggleIcon.classList.remove("fa-chevron-up");
            toggleIcon.classList.add("fa-chevron-down");
        }
        // Nếu đã mở, không làm gì cả
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
        const response = await fetch(
            `http://127.0.0.1:8000/api/tin-nhan/${roomId}`
        );
        const rooms = await response.json();
        console.log("🚀 ~ updateChatHeader ~ rooms:", rooms);

        // Kiểm tra xem mảng có ít nhất một phòng chat không
        if (rooms.length > 0) {
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

            console.log(
                "🚀 ~ updateChatHeader ~ currentRecipientId:",
                currentRecipientId
            );

            // Kiểm tra sự tồn tại của `anh_dai_dien` và các trường dữ liệu khác
            // const avatarUrl =
            //     room.nguoi_nhan.anh_dai_dien || "default-avatar.png"; // Đặt ảnh mặc định nếu không có ảnh
            const otherUser =
                room.nguoi_gui.id === authUserId
                    ? room.nguoi_nhan
                    : room.nguoi_gui;

            chatHeader.innerHTML = `
                <img src="assets/images/avatar/avt-6.jpg" alt="User Avatar" class="avatar">
                <div class="user-info">
                    <p class="user-name">${otherUser.ten}</p>
                    <p class="user-status">${room.trang_thai}</p>
                </div>
            `;
        } else {
            console.error("No rooms found");
        }
    }

    // Xử lý khi click vào phòng chat
    chatList.addEventListener("click", async (e) => {
        const roomElement = e.target.closest(".chat-user");
        if (roomElement) {
            const roomId = roomElement.getAttribute("data-room-id");
            currentRoomId = roomId;
            unreadMessages[roomId] = 0;
            const unreadBadge = document.querySelector(
                `.unread-count[data-room-id="${roomId}"]`
            );
            if (unreadBadge) {
                unreadBadge.textContent = "0";
                unreadBadge.style.display = "none";
            }

            incrementNotificationBadge();
            // Cập nhật tiêu đề phòng chat và tải tin nhắn ban đầu
            await updateChatHeader(roomId);
            await loadMessages(roomId);

            // Lắng nghe sự kiện thời gian thực từ phòng
            window.Echo.leaveChannel(`chat.${currentRoomId}`);
            window.Echo.channel(`chat.${roomId}`).listen(
                ".new-message",
                (e) => {
                    // Cập nhật giao diện với tin nhắn mới
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
    +(messageInput.addEventListener("click", () => {
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
        }
    }),
    // Gửi tin nhắn
    sendButton.addEventListener("click", async () => {
        const messageInput = document.getElementById("messageInput");
        const message = messageInput.value.trim();

        console.log("🚀 ~ sendButton.addEventListener ~ message:", message);
        console.log(
            "🚀 ~ sendButton.addEventListener ~ message:",
            currentRecipientId
        );
        console.log(
            "🚀 ~ sendButton.addEventListener ~ message:",
            currentRoomId
        );
        console.log("🚀 ~ sendButton.addEventListener ~ message:", authUserId);

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

document
    .getElementById("messageInput")
    .addEventListener("keydown", function (event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault(); // Ngừng hành động mặc định của phím Enter (xuống dòng)
            document.getElementById("sendButton").click(); // Gửi tin nhắn
        }
    });
