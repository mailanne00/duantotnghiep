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

            const lastMessageContent = tinNhan || "Chưa có tin nhắn";

            // Kiểm tra độ dài và cắt chuỗi nếu cần
            const truncatedMessage =
                lastMessageContent.length > 15
                    ? lastMessageContent.slice(0, 15) + "..."
                    : lastMessageContent;

            // Tạo nội dung cho phòng mới
            newRoomElement.innerHTML = `
                <img src="{{ \Illuminate\Support\Facades\Storage::url('${avatarNguoiNhan}') }}" alt="User Avatar" class="rounded-circle chat-avatar">
                <div class="chat-user-info ms-2">
                    <p class="chat-user-name mb-0">${tenNguoiNhan}</p>
                    <p class="chat-last-message text-muted small mb-0" id="lastMessage">
                        ${truncatedMessage || "Chưa có tin nhắn"}
                    </p>
                </div>
            `;

            chatList.appendChild(newRoomElement);
            newRoomElement.click(); // Chuyển vào phòng vừa tạo
        }

        // Gọi callback sau khi hoàn thành
        if (typeof callback === "function") {
            callback();
        }
    }

    // Định nghĩa hàm incrementNotificationBadge
    function incrementNotificationBadge() {
        const badge = document.getElementById("notificationBadge");
        if (badge) {
            let currentCount = parseInt(badge.textContent, 10) || 0;
            badge.textContent = currentCount + 1;
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
                incrementNotificationBadge(); // Gọi hàm sau khi nhận tin nhắn mới
            }
        })
        .error((error) => {
            console.error("Lỗi khi lắng nghe kênh:", error);
        });

    Echo.channel("lich-su-thue-channel").listen(
        ".lich-su-thue.updated",
        (data) => {
            const { lichSuThue } = data;
            console.log("Lịch sử thuê mới:", lichSuThue);

            if (lichSuThue) {
                const donThueContainer = document.getElementById("donThue");
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
                        <h5 class="mb-2">Đơn thuê mới đến từ: ${lichSuThue.nguoi_thue.ten}</h5>
                        <p class="mb-1"><strong>Thời gian thuê:</strong> ${lichSuThue.gio_thue} giờ</p>
                       <p class="mb-1"><strong>Thời gian còn lại:</strong> <span id="countdownTimer">...</span></p>
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
                        donThueContainer.innerHTML = "";
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
