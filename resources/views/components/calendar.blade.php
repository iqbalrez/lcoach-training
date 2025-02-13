<div class="flex items-center justify-center">
    <div class="calendar-container shadow-lg w-full">
        <div class="md:p-8 p-5 bg-white rounded-t w-full">
            <div class="flex items-center justify-between">
                <span id="month-year" class="text-base font-bold text-gray-800"></span>
                <div class="flex items-center">
                    <button id="prev-month" aria-label="calendar backward" class=" hover:text-gray-400 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="15 6 9 12 15 18" />
                        </svg>
                    </button>
                    <button id="next-month" aria-label="calendar forward" class=" hover:text-gray-400 ml-3 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="9 6 15 12 9 18" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 w-full">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Mo</th>
                            <th>Tu</th>
                            <th>We</th>
                            <th>Th</th>
                            <th>Fr</th>
                            <th>Sa</th>
                            <th>Su</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                        <!-- Calendar days will be dynamically generated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function generateCalendar(year, month) {
        const calendarBody = document.querySelector("#calendar-body");
        const monthYearDisplay = document.querySelector("#month-year");
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarBody.innerHTML = "";

        const monthNames = [
            "January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];
        monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

        let date = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");
                const cellText = document.createElement("div");
                cellText.className = "px-2 py-2 cursor-pointer flex w-full justify-center";

                if (i === 0 && j < firstDay) {
                    cell.appendChild(cellText);
                } else if (date > daysInMonth) {
                    cell.appendChild(cellText);
                } else {
                    const day = document.createElement("p");
                    day.className = "text-base text-gray-500 font-medium";
                    day.textContent = date;

                    const today = new Date();
                    if (year === today.getFullYear() && month === today.getMonth() && date === today.getDate()) {
                        day.className =
                            "hover:bg-indigo-500 text-base w-full h-full flex items-center justify-center text-white bg-indigo-700 rounded-full";
                    }

                    cellText.appendChild(day);
                    cell.appendChild(cellText);
                    date++;
                }

                row.appendChild(cell);
            }

            calendarBody.appendChild(row);
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        const today = new Date();
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth();

        generateCalendar(currentYear, currentMonth);

        document.querySelector("#prev-month").addEventListener("click", () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentYear, currentMonth);
        });

        document.querySelector("#next-month").addEventListener("click", () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentYear, currentMonth);
        });
    });
</script>