import "./bootstrap";

let IdPhongNew = null;
let nguoiNhanTen = "";

document.addEventListener("DOMContentLoaded", () => {
    $("#sendMessageBtn").on("click", async function () {
        const nguoiNhan = $("#nguoiNhan").val();
        const tinNhan = $("#chatMessage").val();
        const tenNguoiNhan = $("#tenNguoiNhan").val();

        nguoiNhanTen = tenNguoiNhan;

        if (!tinNhan.trim()) {
            alert("Tin nhắn không được để trống!");
            return;
        }

        try {
            const response = await axios.post(
                "http://127.0.0.1:8000/api/tao-chat",
                {
                    tin_nhan: tinNhan,
                    nguoi_gui: authUserId,
                    nguoi_nhan: nguoiNhan,
                }
            );

            $("#chatMessage").val(""); // Reset ô nhập tin nhắn
            IdPhongNew = response.data.phong_chat_id;
            // await markMessagesAsRead(IdPhongNew);
            console.log(`Đã lắng nghe kênh phong-chat.${IdPhongNew}`);
        } catch (error) {
            console.error("Có lỗi xảy ra khi gửi tin nhắn:", error);
            alert("Không thể gửi tin nhắn. Vui lòng thử lại.");
        }
    });

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

    function handleRoomClick(phongChatId, tenNguoiNhan) {
        const roomElement = document.querySelector(
            `.chat-user[data-room-id="${phongChatId}"]`
        );

        if (roomElement) {
            roomElement.click();
        } else {
            const chatList = document.getElementById("chatList");
            const newRoomElement = document.createElement("li");
            newRoomElement.className =
                "chat-user d-flex align-items-center mb-3";
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

    Echo.channel(`tin-nhan-moi-channel`)
        .listen(".tin-nhan-moi.updated", (e) => {
            console.log("Tin nhắn mới:", e);

            if (!e.tinNhan.phong_chat_id) {
                console.error("IdPhong không được xác định!");
                return;
            }

            if (
                authUserId === e.tinNhan.nguoi_nhan ||
                authUserId === e.tinNhan.nguoi_gui
            ) {
                toggleChatbox();
                handleRoomClick(e.tinNhan.phong_chat_id, nguoiNhanTen);
                markMessagesAsRead(e.tinNhan.phong_chat_id);
                incrementNotificationBadge();
            }
        })
        .error((error) => {
            console.error("Lỗi khi lắng nghe kênh:", error);
        });
});

// Hàm thêm hoặc chọn phòng chat

// Lắng nghe sự kiện tin nhắn mới
