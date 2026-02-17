import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap CSS
import 'bootstrap'; // Import Bootstrap JS

import TableFilter from 'tablefilter';

// Make it globally accessible if you want to use it in inline scripts
window.TableFilter = TableFilter;

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css"; // Basic style

// Optional: Import a specific theme (e.g., dark or bootstrap)
// import "flatpickr/dist/themes/material_blue.css";

// Make it available globally if needed
window.flatpickr = flatpickr;
