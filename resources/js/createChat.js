import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    $(document).ready(function () {
        $("#sendMessageBtn").on("click", async function () {
            const nguoiNhan = $("#nguoiNhan").val();
            const tinNhan = $("#chatMessage").val();

            if (!tinNhan.trim()) {
                alert("Tin nhắn không được để trống!");
                return;
            }

            const response = await axios.post(
                "http://127.0.0.1:8000/api/tao-chat",
                {
                    tin_nhan: tinNhan,
                    nguoi_gui: authUserId,
                    nguoi_nhan: nguoiNhan,
                }
            );

            $("#chatMessage").val("");

            console.log("Tao thanh cong roi nay", response.data);
        });
    });
});
