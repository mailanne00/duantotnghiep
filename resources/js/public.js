import './bootstrap';

window.Echo.channel('lichSuThues')
    .listen('LichSuThueCreated', (event) => {
    console.log(event);
    alert(`Voucher mới: ${event.nguoi_thue} ${event.gio_thue}% giảm giá!`);
});