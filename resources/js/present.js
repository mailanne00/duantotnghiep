import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const chatList = document.getElementById("chatList");
    const chatHeader = document.getElementById("chatHeader");
    const messageContainer = document.getElementById("messageContainer");
    const messageInput = document.getElementById("messageInput");
    const sendButton = document.getElementById("sendButton");

    let currentRoomId = null;
    let currentRecipientId = null;
    let currentroomId = null;

    const unreadMessages = {};

    // Lấy danh sách phòng chat từ server
    async function loadChatRooms() {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/tin-nhan");
            const rooms = await response.json();
            console.log("🚀 ~ loadChatRooms ~ rooms:", rooms);

            // console.log("🚀 ~ loadChatRooms ~ rooms:", rooms);

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

                        const lastMessageContent =
                            room.messages[room.messages.length - 1]?.tin_nhan ||
                            "Chưa có tin nhắn";

                        // Kiểm tra độ dài và cắt chuỗi nếu cần
                        const truncatedMessage =
                            lastMessageContent.length > 15
                                ? lastMessageContent.slice(0, 15) + "..."
                                : lastMessageContent;

                        const avatar = otherUser.anh_dai_dien;
                        const updatedAvatar = avatar.replace(/^public\//, "");

                        chatList.innerHTML += `
                        <li class="chat-user d-flex align-items-center mb-3 p-2" data-room-id="${
                            room.phong_chat_id
                        }">
                            <img src="/storage/${updatedAvatar}" alt="User Avatar" class="rounded-circle chat-avatar">
                            <div class="chat-user-info ms-2">
                                <p class="chat-user-name mb-0">${
                                    otherUser.ten
                                }</p>
<p class="chat-last-message text-muted small mb-0">
                    ${truncatedMessage}
                </p>
                            </div>
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
        // console.log("🚀 ~ loadMessages ~ messages:", messages);

        messageContainer.innerHTML = messages
            .map((msg) => {
                const isCurrentUser = msg.nguoi_gui.id === authUserId;

                // Lấy ảnh từ người gửi hoặc người nhận
                const avatar = isCurrentUser
                    ? msg.nguoi_nhan.anh_dai_dien.replace(/^public\//, "")
                    : msg.nguoi_gui.anh_dai_dien.replace(/^public\//, "");

                return `
                <div class="message ${isCurrentUser ? "you" : "user1"}">
                    ${
                        !isCurrentUser
                            ? `<img src="/storage/${avatar}" alt="User Avatar" class="avatar">`
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

            const responseLichSuThue = await fetch(
                `http://127.0.0.1:8000/api/lich-su-thue/${authUserId}`
            );
            const LichSuThue = await responseLichSuThue.json();
            console.log("Lịch sử người thuê", LichSuThue);

            const responseLichSuDuocThue = await fetch(
                `http://127.0.0.1:8000/api/lich-su-duoc-thue/${authUserId}`
            );
            const LichSuDuocThue = await responseLichSuDuocThue.json();
            console.log("Lịch sử người được thuê", LichSuDuocThue);

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
            Echo.join("presence-online-users")
                .here((users) => {
                    users.forEach((user) => {
                        updateUserStatus(user.id, true); // Cập nhật trạng thái người dùng
                    });
                })
                .joining((user) => {
                    updateUserStatus(user.id, true); // Người dùng tham gia
                })
                .leaving((user) => {
                    updateUserStatus(user.id, false); // Người dùng rời khỏi
                });

            // Kiểm tra xem mảng có ít nhất một phòng chat không
            if (rooms.length === 0) {
                console.error("No rooms found");
                return;
            }

            const room = rooms[0];
            currentRecipientId = room.nguoi_gui.id;
            currentroomId = room.phong_chat_id;

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

            const avatar = otherUser.anh_dai_dien;
            const updatedAvatar = avatar.replace(/^public\//, "");

            // Cập nhật giao diện tiêu đề chat
            const chatHeader = document.querySelector(".chat-header");
            if (chatHeader) {
                chatHeader.innerHTML = `
                    <div class="chat-header-container">
                        <img src="storage/${updatedAvatar}" alt="User Avatar" class="avatar">
                        <div class="user-info">
                            <p class="user-name">${otherUser.ten}</p>
                            <p class="user-status" data-user-id="${otherUser.id}">Đang không trong phòng chat</p>
                        </div>
                    </div>
                `;
            } else {
                console.error("Chat header element not found");
                return;
            }

            // Lọc lịch sử thuê chưa hết hạn

            const validLichSuThue = LichSuThue.data.filter((lichSuThue) => {
                const expiredTime = new Date(lichSuThue.expired);
                const currentTime = new Date();
                return expiredTime > currentTime; // Chỉ lấy những đơn thuê chưa hết hạn
            });
            const validLichSuDuocThue = LichSuDuocThue.data.filter(
                (lichSuDuocThue) => {
                    const expiredTime = new Date(lichSuDuocThue.expired);
                    const currentTime = new Date();
                    return expiredTime > currentTime;
                }
            );

            const validLichSu = [...validLichSuThue, ...validLichSuDuocThue];
            const donThueContainer = document.getElementById("donThue");

            let trangThai = "";

            if (validLichSu.length > 0) {
                const lichSuThue = validLichSu[0];

                trangThai = Number(lichSuThue.trang_thai);
                console.log("trangThai", trangThai);

                // Hiển thị thông báo cho người thuê hoặc người được thuê
                let notificationMessage = "";
                let linkUrl = "";
                if (validLichSuThue.length > 0) {
                    // Người thuê đang có đơn thuê
                    notificationMessage = `Bạn đang có đơn thuê: ${
                        lichSuThue.nguoi_duoc_thue_info.ten ||
                        "Tên người nhận đơn"
                    }`;
                    linkUrl = "/lich-su-thue";
                } else if (validLichSuDuocThue.length > 0) {
                    // Người được thuê có đơn thuê đến từ
                    notificationMessage = `Bạn đang có đơn thuê đến từ: ${
                        lichSuThue.nguoi_thue_info.ten || "Tên người gửi đơn"
                    }`;
                    linkUrl = "/lich-su-duoc-thue";
                }

                if (trangThai === 0) {
                    function formatTime(seconds) {
                        const minutes = Math.floor(seconds / 60);
                        const secs = seconds % 60;
                        return `${minutes}:${secs < 10 ? "0" + secs : secs}`;
                    }

                    // Function to start countdown
                    function startCountdown(expiredTime) {
                        const countdownTimer =
                            document.getElementById("countdownTimer");

                        if (!countdownTimer) {
                            console.error("Countdown element not found");
                            return;
                        }

                        // Calculate initial remaining time in seconds
                        let remainingTime = Math.floor(
                            (new Date(expiredTime) - new Date()) / 1000
                        );

                        console.log("Thời gian còn lại:", remainingTime);

                        // Function to update the countdown display
                        function updateCountdown() {
                            if (remainingTime <= 0) {
                                clearInterval(countdownInterval); // Stop when time is up
                                countdownTimer.textContent = "Hết thời gian";
                            } else {
                                countdownTimer.textContent =
                                    formatTime(remainingTime); // Update countdown text
                            }
                        }

                        // Update countdown initially
                        updateCountdown();

                        // Update countdown every second
                        const countdownInterval = setInterval(() => {
                            remainingTime -= 1; // Decrease by 1 second
                            updateCountdown(); // Update the display
                        }, 1000); // Run every second
                    }

                    donThueContainer.innerHTML = `
                    <div class="don-thue-header p-3 border rounded mb-3 bg-primary text-white">
                        <h5 class="mb-2">${notificationMessage}</h5>
                        <p class="mb-1"><strong>Thời gian thuê:</strong>${lichSuThue.gio_thue} Giờ</p>
                                                             <p class="mb-1"><strong>Thời gian còn lại:</strong> <span id="countdownTimer">...</span></p>

                        <div class="button-group mt-3">
                            <button class="btn btn-success me-2" id="acceptBtn">Đi đến đơn thuê</button>
                        </div>
                    </div>
                `;
                    startCountdown(lichSuThue.expired);
                    const retryBtn = document.getElementById("retryBtn");
                    if (retryBtn) {
                        retryBtn.addEventListener("click", () => {
                            // Ẩn popup bằng cách xóa nội dung
                            donThueContainer.innerHTML = "";
                        });
                    }
                }

                if (trangThai === 1) {
                    donThueContainer.innerHTML = `
                    <div class="don-thue-header p-3 border rounded mb-3 bg-primary text-white">
                        <h5 class="mb-2">${notificationMessage}</h5>
                        <p class="mb-1"><strong>Thời gian thuê:</strong>${lichSuThue.gio_thue} Giờ</p>
                        <p class="mb-1">Đơn này đã thanh công</p>
                        <div class="button-group mt-3">
                            <button class="btn btn-success me-2" id="retryBtn">Tuyệt vời</button>
                        </div>
                    </div>
                `;

                    const retryBtn = document.getElementById("retryBtn");
                    if (retryBtn) {
                        retryBtn.addEventListener("click", () => {
                            // Ẩn popup bằng cách xóa nội dung
                            donThueContainer.innerHTML = "";
                        });
                    }
                }

                if (trangThai === 2) {
                    donThueContainer.innerHTML = `
                    <div class="don-thue-header p-3 border rounded mb-3 bg-primary text-white">
                        <h5 class="mb-2">${notificationMessage}</h5>
                        <p class="mb-1"><strong>Thời gian thuê:</strong>${lichSuThue.gio_thue} Giờ</p>
                        <p class="mb-1">Đơn này đã bị hủy</p>
                        <div class="button-group mt-3">
                            <button class="btn btn-success me-2" id="retryBtn">Tiếc quá</button>
                        </div>
                    </div>
                `;

                    const retryBtn = document.getElementById("retryBtn");
                    if (retryBtn) {
                        retryBtn.addEventListener("click", () => {
                            donThueContainer.innerHTML = ""; // Xóa nội dung hiển thị khi bấm nút "Thuê lại"
                        });
                    }
                }

                if (trangThai === 3) {
                    console.log("Trang thái hiện tại là 3");

                    const isNguoiThue = validLichSuThue.some(
                        (lichSuThue) => lichSuThue.nguoi_thue === authUserId
                    );

                    console.log("isNguoiThue", isNguoiThue);

                    function formatTime(seconds) {
                        const minutes = Math.floor(seconds / 60);
                        const secs = seconds % 60;
                        return `${minutes}:${secs < 10 ? "0" + secs : secs}`;
                    }

                    // Function to start countdown
                    function startCountdown(expiredTime) {
                        const countdownTimer =
                            document.getElementById("countdownTimer");

                        if (!countdownTimer) {
                            console.error("Countdown element not found");
                            return;
                        }

                        // Calculate initial remaining time in seconds
                        let remainingTime = Math.floor(
                            (new Date(expiredTime) - new Date()) / 1000
                        );

                        // Function to update the countdown display
                        function updateCountdown() {
                            if (remainingTime <= 0) {
                                clearInterval(countdownInterval); // Stop when time is up
                                countdownTimer.textContent = "Hết thời gian";
                            } else {
                                countdownTimer.textContent =
                                    formatTime(remainingTime); // Update countdown text
                            }
                        }

                        // Update countdown initially
                        updateCountdown();

                        // Update countdown every second
                        const countdownInterval = setInterval(() => {
                            remainingTime -= 1; // Decrease by 1 second
                            updateCountdown(); // Update the display
                        }, 1000); // Run every second
                    }
                    donThueContainer.innerHTML = `
                        <div class="don-thue-header p-3 border rounded mb-3 bg-primary text-white">
                            <h5 class="mb-2">${notificationMessage}</h5>
                            <p class="mb-1"><strong>Thời gian thuê:</strong>${
                                lichSuThue.gio_thue
                            } Giờ</p>
                                     <p class="mb-1"><strong>Đơn đang được thực hiện:</strong> <span id="countdownTimer">...</span></p>


                   <div class="button-group mt-3 d-flex justify-content-start align-items-center gap-2">
    <button class="btn btn-success" id="acceptBtn">Đi đến đơn thuê</button>
    ${
        isNguoiThue
            ? `<button class="btn btn-warning ml-2" id="tocaoBtn">Tố cáo player</button>`
            : ""
    }
</div>
                        </div>
                    `;
                    startCountdown(lichSuThue.expired);
                    if (isNguoiThue) {
                        document
                            .getElementById("tocaoBtn")
                            .addEventListener("click", function () {
                                document.getElementById(
                                    "reportModal"
                                ).style.display = "block";
                            });

                        // Đóng modal khi nhấn nút Hủy
                        document
                            .getElementById("cancelBtnToCao")
                            .addEventListener("click", function () {
                                document.getElementById(
                                    "reportModal"
                                ).style.display = "none";
                            });

                        // Thêm sự kiện cho nút gửi tố cáo
                        document
                            .getElementById("submitReportBtn")
                            .addEventListener("click", function () {
                                var reason =
                                    document.getElementById(
                                        "reportReason"
                                    ).value;
                                var successMessage = document.getElementById(
                                    "reportSuccessMessage"
                                );
                                console.log(
                                    "Thông báo của tố cáo",
                                    successMessage
                                );

                                var nguoiToCao = authUserId;
                                var nguoiBiToCao = lichSuThue.nguoi_duoc_thue;
                                var lichSuThueId = lichSuThue.id; // Lấy ID lịch sử thuê
                                var anhBangChung =
                                    "/uploadedImageUrl.jpg" || null; // Nếu có ảnh bằng chứng, lấy URL ảnh (có thể rỗng nếu không có ảnh)
                                var trangThai = 0; // Trạng thái tố cáo (ví dụ: 1 là đang xử lý)
                                var phongChatId = currentroomId; // ID phòng chat, nếu có

                                if (reason.trim()) {
                                    // Tạo đối tượng dữ liệu để gửi
                                    var data = {
                                        nguoi_to_cao: nguoiToCao,
                                        nguoi_bi_to_cao: nguoiBiToCao,
                                        lich_su_thue_id: lichSuThueId,
                                        anh_bang_chung: anhBangChung,
                                        ly_do: reason,
                                        trang_thai: trangThai,
                                        phong_chat_id: phongChatId,
                                    };

                                    console.log("Dữ liệu tố cáo:", data);

                                    fetch("http://127.0.0.1:8000/api/to-cao", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            Accept: "application/json",
                                        },
                                        body: JSON.stringify(data),
                                    })
                                        .then((response) => response.json())
                                        .then((data) => {
                                            if (data.success) {
                                                successMessage.textContent =
                                                    "Đã thêm tố cáo thành công";
                                                successMessage.classList.remove(
                                                    "d-none"
                                                );
                                                // Đóng modal sau khi gửi tố cáo thành công
                                                document.getElementById(
                                                    "reportModal"
                                                ).style.display = "none";

                                                document.getElementById(
                                                    "reportReason"
                                                ).value = "";

                                                setTimeout(() => {
                                                    successMessage.classList.add(
                                                        "d-none"
                                                    );
                                                }, 3000);
                                            } else {
                                                document.getElementById(
                                                    "reportReason"
                                                ).value = "";
                                                successMessage.textContent =
                                                    "Đơn tố cáo đã tồn tại";
                                                successMessage.classList.remove(
                                                    "d-none"
                                                );
                                            }
                                        })
                                        .catch((error) => {
                                            successMessage.textContent =
                                                "Lỗi khi gửi yêu cầu";
                                            successMessage.classList.remove(
                                                "d-none"
                                            );
                                        });
                                } else {
                                    successMessage.textContent =
                                        "Vui lòng nhập nội dung";
                                    successMessage.classList.remove("d-none");
                                }
                            });
                    }
                } else {
                    console.error(
                        "Unhandled trang_thai:",
                        lichSuThue.trang_thai
                    );
                }

                if (trangThai === 4) {
                    donThueContainer.innerHTML = `
                    <div class="don-thue-header p-3 border rounded mb-3 bg-primary text-white">
                        <h5 class="mb-2">${notificationMessage}</h5>
                        <p class="mb-1"><strong>Thời gian thuê:</strong>${lichSuThue.gio_thue} Giờ</p>
                        <p class="mb-1">Đang trong trạng thái tranh chấp</p>
<div class="button-group mt-3">
                            <button class="btn btn-success me-2" id="acceptBtn">Đi đến đơn thuê</button>
                        </div>
                    </div>
                `;
                }

                document
                    .getElementById("acceptBtn")
                    .addEventListener("click", () => {
                        window.location.href = linkUrl; // Chuyển hướng khi bấm "Đi đến đơn thuê"
                    });
            }
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

            // console.log(`Messages in room ${phongChatId} marked as read`);
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
            // console.log(currentRoomId, roomId);

            // Cập nhật tiêu đề phòng chat và tải tin nhắn ban đầu
            await updateChatHeader(roomId);
            await loadMessages(roomId);

            // Lắng nghe sự kiện thời gian thực từ phòng
            window.Echo.leaveChannel(`chat.${currentRoomId}`);
            window.Echo.channel(`chat.${roomId}`).listen(
                ".new-message",
                (e) => {
                    // console.log("New message received:", e);
                    const avatar = e.nguoi_gui.anh_dai_dien.replace(
                        /^public\//,
                        ""
                    );

                    messageContainer.innerHTML += `
                    <div class="message ${
                        e.message.nguoi_gui === authUserId ? "you" : "user1"
                    }">
                        ${
                            e.message.nguoi_gui !== authUserId
                                ? `<img src="storage/${avatar}" alt="User Avatar" class="avatar">`
                                : ""
                        }
                        <p>${e.message.tin_nhan}</p>
                    </div>
                `;

                    const roomId = e.message.phong_chat_id;
                    const chatListItem = document.querySelector(
                        `.chat-user[data-room-id="${roomId}"]`
                    );
                    if (chatListItem) {
                        const lastMessage =
                            chatListItem.querySelector(".chat-last-message");
                        if (lastMessage) {
                            lastMessage.textContent = e.message.tin_nhan;
                        }
                    }
                    if (e.message.nguoi_nhan === authUserId) {
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

        console.log("Tin nhắn:", messageInput);
        console.log("Phòng chat:", message);
        console.log("Người nhận:", currentRecipientId);
        console.log("Người gửi:", currentRoomId);
        console.log("Người gửi123", authUserId);

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

// function clickRoom() {
//     function handleRoomClick(phongChatId, tenNguoiNhan) {
//         const roomElement = document.querySelector(
//             `.chat-user[data-room-id="${phongChatId}"]`
//         );

//         if (roomElement) {
//             roomElement.click();
//         } else {
//             const chatList = document.getElementById("chatList");
//             const newRoomElement = document.createElement("li");
//             newRoomElement.className =
//                 "chat-user d-flex align-items-center mb-3";
//             newRoomElement.setAttribute("data-room-id", phongChatId);
//             newRoomElement.innerHTML = `
//                 <img src="/assets/images/avatar/avt-6.jpg" alt="User Avatar" class="rounded-circle" width="40px" height="40px">
//                 <span class="ms-2">${tenNguoiNhan}</span>
//                 <span class="badge bg-danger ms-auto unread-count" data-room-id="${phongChatId}" style="display: none;">0</span>
//             `;

//             chatList.appendChild(newRoomElement);
//             newRoomElement.click();
//         }
//     }

//     Echo.channel(`tin-nhan-moi-channel`)
//         .listen(".tin-nhan-moi.updated", (e) => {
//             console.log("Tin nhắn mới:", e);

//             if (!e.tinNhan.phong_chat_id) {
//                 console.error("IdPhong không được xác định!");
//                 return;
//             }

//             if (
//                 authUserId === e.tinNhan.nguoi_nhan ||
//                 authUserId === e.tinNhan.nguoi_gui
//             ) {
//                 handleRoomClick(e.tinNhan.phong_chat_id, nguoiNhanTen);
//                 markMessagesAsRead(e.tinNhan.phong_chat_id);
//                 incrementNotificationBadge();
//             }
//         })
//         .error((error) => {
//             console.error("Lỗi khi lắng nghe kênh:", error);
//         });
// }

document
    .getElementById("messageInput")
    .addEventListener("keydown", function (event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault(); // Ngừng hành động mặc định của phím Enter (xuống dòng)
            document.getElementById("sendButton").click(); // Gửi tin nhắn
        }
    });
