document.addEventListener("DOMContentLoaded", function () {
    const rowsPerPage = 5;
    const tableBody = document.getElementById("table-body");
    const pagination = document.getElementById("pagination");
    let currentPage = 1;

    if (!tableBody || !pagination) {
        return;
    }

    function getRows() {
        return Array.from(tableBody.querySelectorAll("tr"));
    }

    function getTotalPages(rows) {
        return Math.max(1, Math.ceil(rows.length / rowsPerPage));
    }

    function updatePagination(rows, totalPages) {
        pagination.innerHTML = "";

        if (!rows.length || totalPages <= 1) {
            return;
        }

        const prev = document.createElement("li");
        prev.className = "page-item " + (currentPage === 1 ? "disabled" : "");
        prev.innerHTML = '<a class="page-link" href="#">&laquo;</a>';
        prev.onclick = function (e) {
            e.preventDefault();
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        };
        pagination.appendChild(prev);

        let startPage = Math.max(1, currentPage - 1);
        let endPage = Math.min(totalPages, currentPage + 1);

        if (currentPage === 1) {
            endPage = Math.min(3, totalPages);
        }

        if (currentPage === totalPages) {
            startPage = Math.max(1, totalPages - 2);
        }

        for (let i = startPage; i <= endPage; i++) {
            const li = document.createElement("li");
            li.className = "page-item " + (i === currentPage ? "active" : "");
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.onclick = function (e) {
                e.preventDefault();
                showPage(i);
            };
            pagination.appendChild(li);
        }

        const next = document.createElement("li");
        next.className = "page-item " + (currentPage === totalPages ? "disabled" : "");
        next.innerHTML = '<a class="page-link" href="#">&raquo;</a>';
        next.onclick = function (e) {
            e.preventDefault();
            if (currentPage < totalPages) {
                showPage(currentPage + 1);
            }
        };
        pagination.appendChild(next);
    }

    function showPage(page) {
        const rows = getRows();
        const totalPages = getTotalPages(rows);

        currentPage = Math.min(Math.max(page, 1), totalPages);

        rows.forEach(function (row) {
            row.style.display = "none";
        });

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        for (let i = start; i < end && i < rows.length; i++) {
            rows[i].style.display = "";
        }

        tableBody.style.display = rows.length ? "table-row-group" : "none";
        updatePagination(rows, totalPages);
    }

    window.refreshTablePagination = function (page) {
        showPage(page || 1);
    };

    window.refreshTablePagination(1);
});
