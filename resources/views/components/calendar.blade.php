<div class="flex items-center justify-center">
    <div class="calendar-container shadow-lg w-full overflow-x-hidden relative">
        <div id="calendar" class="absolute translate-x-0 transition-transform ease-in-out delay-150 duration-300 md:p-8 p-5 bg-white rounded-t w-full h-full">
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
                <table class="w-full h-fit">
                    <thead>
                        <tr>
                            <th>Su</th>
                            <th>Mo</th>
                            <th>Tu</th>
                            <th>We</th>
                            <th>Th</th>
                            <th>Fr</th>
                            <th>Sa</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                        <!-- Calendar days will be dynamically generated here -->
                    </tbody>
                </table>
            </div>
        </div>
        
        <div id="meetingRequestForm" class="translate-x-full transition-transform ease-in-out delay-150 duration-300 md:p-8 p-5 bg-white rounded-t w-full">
            <div class="flex gap-2 pb-2">
                <button id="form-back" aria-label="form-back" class=" hover:text-gray-400 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="15 6 9 12 15 18" />
                    </svg>
                </button>
                <h2 class="text-base font-bold text-gray-800">Meeting Request</h2>
            </div>
            <form action="{{ route('user.meeting-request.store') }}" method="POST">
                @csrf
                <div class="flex gap-2">
                    <div class="mb-4 flex-grow">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="date" name="date" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-950 focus:border-blue-950 sm:text-sm">
                    </div>
                    <div class="mb-4 flex-shrink">
                        <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                        <input type="time" id="time" name="time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-950 focus:border-blue-950 sm:text-sm">
                    </div>
                </div>
                <x-input id="name" label="Nama" name="name" required />
                <x-input id="email" label="Email" name="email" type="email" required />
                <x-input id="company" label="Asal Perusahaan" name="company" />
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-950 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-950">
                        Submit
                    </button>
                </div>
            </form>
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
                            "hover:bg-amber-500 text-xs p-1 w-full h-full flex items-center justify-center text-white bg-blue-950 rounded-full";
                    }

                    cellText.appendChild(day);
                    cell.appendChild(cellText);
                    cell.addEventListener("click", () => {
                        document.querySelector("#meetingRequestForm").classList.remove("translate-x-full");
                        document.querySelector("#meetingRequestForm").classList.add("translate-x-0");
                        document.querySelector("#calendar").classList.remove("translate-x-0");
                        document.querySelector("#calendar").classList.add("-translate-x-full");
                        document.querySelector("#date").value = `${year}-${String(month + 1).padStart(2, '0')}-${String(day.textContent).padStart(2, '0')}`;
                        console.log(document.querySelector("#date").value);
                    });
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

        const form = document.querySelector("#meetingRequestForm");
        const calendar = document.querySelector("#calendar");
        const dateInput = document.querySelector("#date");

        document.querySelectorAll("#calendar-body td div").forEach(cell => {
            cell.addEventListener("click", () => {
                const selectedDate = cell.textContent.trim();
                const monthYear = document.querySelector("#month-year").textContent;
                dateInput.value = `${selectedDate} ${monthYear}`;
            });
        });

        document.querySelector("#form-back").addEventListener("click", () => {
            form.classList.remove("translate-x-0");
            form.classList.add("translate-x-full");
            calendar.classList.remove("-translate-x-full");
            calendar.classList.add("translate-x-0");
        });
        
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