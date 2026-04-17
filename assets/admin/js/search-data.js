document.addEventListener("DOMContentLoaded", function () {
    const searchSection = document.getElementById("dataPasienSearchSection");
    const searchBtn = document.getElementById("searchDataButton");
    const resetBtn = document.getElementById("resetSearch");
    const searchInput = document.getElementById("searchInput");
    const startDate = document.getElementById("startDate");
    const endDate = document.getElementById("endDate");
    const tableBody = document.getElementById("table-body");

    if (!searchSection || !searchBtn || !resetBtn || !searchInput || !startDate || !endDate || !tableBody) {
        return;
    }

    const searchUrl = searchSection.dataset.searchUrl || `${BASE_URL}dataPasien/search`;
    const initialTableBodyHtml = tableBody.innerHTML;
    const initialTableBodyDisplay = tableBody.style.display;

    function refreshPagination() {
        if (typeof window.refreshTablePagination === "function") {
            window.refreshTablePagination(1);
        }
    }

    function renderEmptyState(message) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center text-muted py-4">
                    ${message}
                </td>
            </tr>
        `;
        tableBody.style.display = "table-row-group";
        refreshPagination();
    }

    function fetchData() {
        const params = new URLSearchParams({
            keyword: searchInput.value,
            startDate: startDate.value,
            endDate: endDate.value
        });

        fetch(`${searchUrl}?${params.toString()}`, {
            headers: {
                Accept: "application/json"
            }
        })
            .then(function (res) {
                if (!res.ok) {
                    throw new Error(`Request gagal dengan status ${res.status}`);
                }

                return res.json();
            })
            .then(function (data) {
                tableBody.innerHTML = "";

                if (!Array.isArray(data) || data.length === 0) {
                    renderEmptyState("Data tidak ditemukan");
                    return;
                }

                data.forEach(function (row, index) {
                    let label = "Rendah";
                    let badge = "bg-label-success";

                    if (Number(row.persen) === 100) {
                        label = "Tinggi";
                        badge = "bg-label-danger";
                    } else if (Number(row.persen) === 50) {
                        label = "Sedang";
                        badge = "bg-label-warning";
                    }

                    const tanggal = new Date(row.created_at).toLocaleDateString("id-ID");

                    tableBody.innerHTML += `
                        <tr>
                            <th>${index + 1}</th>
                            <td>${row.name ?? "-"}</td>
                            <td class="text-center">${row.usia ?? "-"}</td>
                            <td class="text-center">${row.alamat ?? "-"}</td>
                            <td class="text-center">${tanggal}</td>
                            <td class="text-center">${row.persen}%</td>
                            <td class="text-center">
                                <span class="badge ${badge}">${label}</span>
                            </td>
                            <td class="text-center">
                                <a href="${BASE_URL}deteksiDini/unduh/${row.id}" class="btn btn-sm btn-icon btn-label-info">
                                    <i class="tf-icons ti ti-download"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                });

                tableBody.style.display = "table-row-group";
                refreshPagination();
            })
            .catch(function () {
                renderEmptyState("Terjadi kesalahan saat memuat data");
            });
    }

    searchBtn.addEventListener("click", fetchData);

    resetBtn.addEventListener("click", function () {
        searchInput.value = "";
        startDate.value = "";
        endDate.value = "";
        tableBody.innerHTML = initialTableBodyHtml;
        tableBody.style.display = initialTableBodyDisplay;
        refreshPagination();
    });
});
