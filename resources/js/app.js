import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

function formatDateTime(dateTimeString) {
    const dateTime = new Date(dateTimeString);
    const options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
        timeZoneName: "short",
    };
    return dateTime.toLocaleString("en-US", options);
}

window.formatDateTime = formatDateTime;
