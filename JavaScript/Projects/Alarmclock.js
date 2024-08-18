let alarmSound = document.getElementById('alarmSound');
let stopAlarmBtn = document.getElementById('stopAlarmBtn');
let alarmTimeInput = document.getElementById('alarmTime');

// Function to display current time
function updateClock() {
    const clockElement = document.getElementById('clock');
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    clockElement.textContent = `${hours}:${minutes}:${seconds}`;
}

// Function to check and play the alarm sound
function checkAlarm() {
    const alarmTime = alarmTimeInput.value;
    const now = new Date();
    const currentTime = now.toTimeString().slice(0, 5);

    if (alarmTime === currentTime) {
        alarmSound.play();
        stopAlarmBtn.style.display = 'block'; // Show the stop button
    }
}

// Function to stop the alarm sound and reset the alarm input
function stopAlarm() {
    alarmSound.pause();
    alarmSound.currentTime = 0; // Reset sound to the beginning
    stopAlarmBtn.style.display = 'none'; // Hide the stop button
    alarmTimeInput.value = ''; // Reset the alarm time input
}

// Set alarm button event listener
document.getElementById('setAlarmBtn').addEventListener('click', () => {
    const alarmTime = alarmTimeInput.value;
    if (alarmTime) {
        alert(`Alarm set for ${alarmTime}`);
    } else {
        alert('Please select a time to set the alarm.');
    }
});

// Stop alarm button event listener
stopAlarmBtn.addEventListener('click', stopAlarm);

// Update clock every second
setInterval(() => {
    updateClock();
    checkAlarm();
}, 1000);
