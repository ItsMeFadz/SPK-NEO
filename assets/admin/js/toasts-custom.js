window.notifications = null;
document.addEventListener("DOMContentLoaded", function () {
    window.notifications = document.querySelector(".notifications");
});

window.toastDetails = {
    timer: 5000,
    success: {
        icon: 'fa-circle-check',
        text: ''
    },
    error: {
        icon: 'fa-circle-xmark',
        text: ''
    },
    warning: {
        icon: 'fa-triangle-exclamation',
        text: ''
    },
    info: {
        icon: 'fa-circle-info',
        text: ''
    }
};

window.removeToast = (toast) => {
    toast.classList.add("hide");
    if (toast.timeoutId) clearTimeout(toast.timeoutId);
    setTimeout(() => toast.remove(), 500);
};

window.createToast = (id) => {
    const { icon, text } = toastDetails[id];

    const toast = document.createElement("li");
    // Bootstrap punya rule `.toast:not(.show) { display: none; }`
    // jadi pastikan toast custom kita punya class `show` supaya tidak tersembunyi.
    toast.className = `toast show ${id}`;

    toast.innerHTML = `
        <div class="column">
            <i class="fa-solid ${icon}"></i>
            <span>${text}</span>
        </div>
        <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>
    `;

    const notifications = document.querySelector(".notifications"); // ← ganti ini
    if (notifications) {
        notifications.appendChild(toast);
        toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
    } else {
        console.error("Notifications element not found");
    }
};
