function create_notification($type, $text) {
    PNotify.removeAll()
    var notice = new PNotify({
        text: $text,
        type: $type,
        mouse_reset: false,
        buttons: {
            sticker: false,
        }
    });
}