export default function toast(sessionMessage = "", sessionType = "success") {
    return {
        show: false,
        message: "",
        type: "success",
        timer: null,

        init() {
            if (sessionMessage) {
                this.dispatchToast(sessionMessage, sessionType);
            }
        },

        dispatchToast(msg, type) {
            clearTimeout(this.timer);
            this.message = msg;
            this.type = type;
            this.show = true;

            this.timer = setTimeout(() => {
                this.show = false;
            }, 5000);
        },

        handleEvent(event) {
            this.dispatchToast(event.detail[0].message, event.detail[0].type);
        },
    };
}
