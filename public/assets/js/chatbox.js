function toggleChatbox() {
    const badge = document.getElementById("notificationBadge");
    unreadCount = 0;
    badge.classList.add("d-none");
    const chatboxBody = document.querySelector(".chatbox-body");
    const toggleIcon = document.getElementById("toggleIcon");

    chatboxBody.style.display =
        chatboxBody.style.display === "block" ? "none" : "block";

    if (chatboxBody.style.display === "block") {
        toggleIcon.classList.remove("fa-chevron-up");
        toggleIcon.classList.add("fa-chevron-down");
    } else {
        toggleIcon.classList.remove("fa-chevron-down");
        toggleIcon.classList.add("fa-chevron-up");
    }
}
