import "./bootstrap";

Echo.channel("lich-su-thue-channel").listen(".lich-su-thue.updated", (data) => {
    console.log("Real-time data:", data);
    // Cập nhật giao diện client
});
