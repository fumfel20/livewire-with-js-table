import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap CSS
import 'bootstrap'; // Import Bootstrap JS

import TableFilter from 'tablefilter';

// Make it globally accessible if you want to use it in inline scripts
window.TableFilter = TableFilter;

// es modules are recommended, if available, especially for typescript
import flatpickr from "flatpickr";

window.flatpickr = flatpickr;
