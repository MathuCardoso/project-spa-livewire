export default function input(inputName) {
    return {
        name: inputName,
        formatName(event) {
            if (this.name == "first_name" || this.name == "last_name") {
                let val = event.target.value;
                if (val) {
                    event.target.value =
                        val.charAt(0).toUpperCase() +
                        val.slice(1).toLowerCase();
                }
            }
        },
    };
}
