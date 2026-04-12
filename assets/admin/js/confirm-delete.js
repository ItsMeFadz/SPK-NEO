(() => {
  const getText = (button) => {
    const customText = button.getAttribute('data-text');
    if (customText) return customText;

    const kode = button.getAttribute('data-kode') || '';
    const name = button.getAttribute('data-name') || '';
    // if (kode || name) return `Hapus ${kode} - ${name} ?`;
    if (kode || name) {
      return `Hapus <strong>${kode}</strong> - <strong>${name}</strong> ?`;
    }

    return 'Yakin ingin menghapus data ini?';
  };

  // gunakan capture supaya handler ini jalan lebih dulu sebelum handler template lain (jika ada)
  document.addEventListener('click', (event) => {
    const button = event.target.closest('.js-confirm-delete');
    if (!button) return;

    const form = button.closest('form');
    if (!form) return;

    event.preventDefault();
    event.stopPropagation();
    event.stopImmediatePropagation();

    const title = button.getAttribute('data-title') || 'Konfirmasi hapus';
    const text = getText(button);
    const icon = button.getAttribute('data-icon') || 'warning';
    const confirmButtonText = button.getAttribute('data-confirm-text') || 'Ya, hapus';
    const cancelButtonText = button.getAttribute('data-cancel-text') || 'Batal';

    if (window.Swal && typeof window.Swal.fire === 'function') {
      const forceHideDenyButton = () => {
        const denyButton = document.querySelector('.swal2-deny');
        if (denyButton) denyButton.style.display = 'none';
      };

      window.Swal.fire({
        title,
        html: text,
        icon,
        showDenyButton: false,
        denyButtonText: '',
        showCancelButton: true,
        confirmButtonText,
        cancelButtonText,
        buttonsStyling: false,
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-label-danger',
          denyButton: 'btn btn-label-secondary d-none'
        },
        willOpen: forceHideDenyButton,
        didOpen: () => {
          forceHideDenyButton();
          setTimeout(forceHideDenyButton, 0);
          setTimeout(forceHideDenyButton, 50);
        }
      }).then((result) => {
        if (result.isConfirmed) form.submit();
      });
      return;
    }

    if (confirm(text)) form.submit();
  }, true);
})();
