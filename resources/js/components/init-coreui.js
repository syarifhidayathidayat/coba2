import { Tooltip, Toast, Popover } from 'bootstrap'

// Inisialisasi CoreUI jika perlu (sidebar, collapse, dropdown otomatis aktif)
document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new Tooltip(el))
