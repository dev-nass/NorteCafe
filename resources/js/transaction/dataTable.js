$(document).ready(function () {
    var table = $('.custom-data-table').DataTable({
        responsive: true,
        columnDefs: [
            {
                targets: '_all',
                searchable: true,
            },
        ],
        initComplete: function () {
            console.log("DataTable initialized successfully!");
        },
    });

    // Custom search function
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var searchTerm = table.search().toLowerCase();

        if (!searchTerm) return true; // If no search term, show all results

        var idValue = data[0]?.toLowerCase() || ""; // Ensure ID column exists

        // Prioritize ID column matching
        if (idValue.includes(searchTerm)) {
            return true;
        }

        // Fallback to default global search behavior
        return data.join(' ').toLowerCase().includes(searchTerm);
    });

    // Trigger search function when input changes
    $('#transaction-table_filter input').on('keyup change', function () {
        table.draw();
    });
});
