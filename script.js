document.addEventListener('DOMContentLoaded', function() {
  const currentDate = new Date();
  let currentMonth = currentDate.getMonth();
  let currentYear = currentDate.getFullYear();
  
  const calendarGrid = document.querySelector('.calendar-grid');
  const currentMonthElement = document.querySelector('.current-month');
  const prevMonthBtn = document.querySelector('.prev-month-btn');
  const nextMonthBtn = document.querySelector('.next-month-btn');

  // Funcție pentru a genera calendarul
  function generateCalendar(month, year) {
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDayOfMonth = new Date(year, month, 1).getDay();

    calendarGrid.innerHTML = '';
    currentMonthElement.textContent = new Date(year, month, 1).toLocaleDateString('default', { month: 'long', year: 'numeric' });

    // Adăugăm zilele în grid
    for (let i = 0; i < firstDayOfMonth; i++) {
      const emptyDay = document.createElement('div');
      emptyDay.classList.add('calendar-day', 'empty-day');
      calendarGrid.appendChild(emptyDay);
    }

    for (let i = 1; i <= daysInMonth; i++) {
      const dayElement = document.createElement('div');
      dayElement.textContent = i;
      dayElement.classList.add('calendar-day');
      calendarGrid.appendChild(dayElement);
    }
  }

  // Generăm calendarul pentru luna curentă la încărcarea paginii
  generateCalendar(currentMonth, currentYear);

  // Buton pentru luna precedentă
  prevMonthBtn.addEventListener('click', function() {
    currentMonth--;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    }
    generateCalendar(currentMonth, currentYear);
  });

  // Buton pentru luna următoare
  nextMonthBtn.addEventListener('click', function() {
    currentMonth++;
    if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    generateCalendar(currentMonth, currentYear);
  });
});