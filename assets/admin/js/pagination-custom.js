document.addEventListener("DOMContentLoaded", function () {
	const rowsPerPage = 5;
	const rows = document.querySelectorAll("#table-body tr");
	document.getElementById("table-body").style.display = "";

	if (!rows.length || !pagination) return; // biar aman kalau tidak ada

	let currentPage = 1;
	const totalPages = Math.ceil(rows.length / rowsPerPage);

	function showPage(page) {
		currentPage = page;

		rows.forEach((row) => {
			row.style.display = "none";
		});

		const start = (page - 1) * rowsPerPage;
		const end = start + rowsPerPage;

		for (let i = start; i < end && i < rows.length; i++) {
			rows[i].style.display = "";
		}

		updatePagination();
	}

	function updatePagination() {
		pagination.innerHTML = "";

		// prev
		const prev = document.createElement("li");
		prev.className = "page-item " + (currentPage === 1 ? "disabled" : "");
		prev.innerHTML = `<a class="page-link" href="#">«</a>`;
		prev.onclick = (e) => {
			e.preventDefault();
			if (currentPage > 1) showPage(currentPage - 1);
		};
		pagination.appendChild(prev);

		// 🔥 number (MAX 3)
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
			li.onclick = (e) => {
				e.preventDefault();
				showPage(i);
			};
			pagination.appendChild(li);
		}

		// next
		const next = document.createElement("li");
		next.className =
			"page-item " + (currentPage === totalPages ? "disabled" : "");
		next.innerHTML = `<a class="page-link" href="#">»</a>`;
		next.onclick = (e) => {
			e.preventDefault();
			if (currentPage < totalPages) showPage(currentPage + 1);
		};
		pagination.appendChild(next);
	}
	showPage(1);
});
