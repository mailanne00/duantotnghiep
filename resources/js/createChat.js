import "./bootstrap";

let IdPhongNew = null;
let nguoiNhanTen = "";
let avatarNguoiNhan = "";

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

            console.log("Gửi tin nhắn thành công:", response.data);
            $("#chatMessage").val("");
            IdPhongNew = response.data.phong_chat_id;
            avatarNguoiNhan = response.data.nguoi_nhan.anh_dai_dien;
            // await markMessagesAsRead(IdPhongNew);
            // console.log(`Đã lắng nghe kênh phong-chat.${IdPhongNew}`);
        } catch (error) {
            console.error("Có lỗi xảy ra khi gửi tin nhắn:", error);
            alert("Không thể gửi tin nhắn. Vui lòng thử lại.");
        }
    });

    function handleRoomClick(phongChatId, tenNguoiNhan, tinNhan, callback) {
        console.log("Phòng chat ID:", phongChatId);
        console.log("Tên người nhận:", tenNguoiNhan);

        const roomElement = document.querySelector(
            `.chat-user[data-room-id="${phongChatId}"]`
        );

        if (roomElement) {
            // Nếu phòng đã tồn tại, chỉ cần click vào nó
            roomElement.click();
        } else {
            // Nếu phòng chưa tồn tại, tạo mới và thêm vào danh sách
            const chatList = document.getElementById("chatList");
            const newRoomElement = document.createElement("li");
            newRoomElement.className =
                "chat-user d-flex align-items-center mb-3";
            newRoomElement.setAttribute("data-room-id", phongChatId);

            // Tạo nội dung cho phòng mới
            newRoomElement.innerHTML = `
    <img src="{{ \Illuminate\Support\Facades\Storage::url('${avatarNguoiNhan}') }}" alt="User Avatar" class="rounded-circle chat-avatar">
                            <div class="chat-user-info ms-2">
                                <p class="chat-user-name mb-0">${tenNguoiNhan}</p>
                                <p class="chat-last-message text-muted small mb-0">
                    ${tinNhan || "Chưa có tin nhắn"}
                </p>
            `;

            chatList.appendChild(newRoomElement);
            newRoomElement.click(); // Chuyển vào phòng vừa tạo
        }

        // Gọi callback sau khi hoàn thành
        if (typeof callback === "function") {
            callback();
        }
    }

    Echo.channel(`tin-nhan-moi-channel`)
        .listen(".tin-nhan-moi.updated", (e) => {
            // console.log("Tin nhắn mới:", e);

            if (!e.tinNhan.phong_chat_id) {
                console.error("IdPhong không được xác định!");
                return;
            }

            if (
                authUserId === e.tinNhan.nguoi_nhan ||
                authUserId === e.tinNhan.nguoi_gui
            ) {
                toggleChatbox();
                const chatListItem = document.querySelector(
                    `.chat-user[data-room-id="${e.tinNhan.phong_chat_id}"]`
                );
                if (chatListItem) {
                    const lastMessage =
                        chatListItem.querySelector(".chat-last-message");
                    if (lastMessage) {
                        lastMessage.textContent = e.tinNhan.tin_nhan;
                    }
                }
                handleRoomClick(
                    e.tinNhan.phong_chat_id,
                    nguoiNhanTen,
                    e.tinNhan.tin_nhan
                );
                incrementNotificationBadge();
            }
        })
        .error((error) => {
            console.error("Lỗi khi lắng nghe kênh:", error);
        });

    Echo.channel("lich-su-thue-channel").listen(
        ".lich-su-thue.updated",
        (data) => {
            const { lichSuThue } = data;
            if (lichSuThue) {
                const donThueContainer = document.getElementById("donThue");
                let remainingTime = 300;

                donThueContainer.innerHTML = `
                    <div class="don-thue-header p-3 border rounded mb-3 bg-primary text-white">
                        <h5 class="mb-2">Đơn thuê mới đến từ: ${
                            lichSuThue.nguoi_thue.ten
                        }</h5>
                        <p class="mb-1"><strong>Thời gian thuê:</strong> ${
                            lichSuThue.gio_thue
                        } giờ</p>
                        <p class="mb-1"><strong>Thời gian còn lại:</strong> <span id="countdownTimer">${formatTime(
                            remainingTime
                        )}</span></p>
                        <div class="button-group mt-3">
                            <button class="btn btn-success me-2" id="acceptBtn">Đi đến đơn thuê</button>
                        </div>
                    </div>
                `;
                document
                    .getElementById("acceptBtn")
                    .addEventListener("click", () => {
                        window.location.href = "/lich-su-duoc-thue";
                    });

                // Đếm ngược thời gian
                const countdownInterval = setInterval(() => {
                    remainingTime--;
                    const countdownTimer =
                        document.getElementById("countdownTimer");
                    if (countdownTimer) {
                        countdownTimer.textContent = formatTime(remainingTime);
                    }

                    if (remainingTime <= 0) {
                        clearInterval(countdownInterval);
                        alert("Thời gian thuê đã hết!");
                        donThueContainer.innerHTML = ""; // Xóa nội dung khi hết thời gian
                    }
                }, 1000);
            }
        }
    );
});

// Hàm định dạng thời gian
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${minutes}:${secs < 10 ? "0" : ""}${secs}`;
}
