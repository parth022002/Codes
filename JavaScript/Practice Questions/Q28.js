//write a program to load a javascript file in a browser using promises use then() to display an alert when the load is complete
// Function to load a script dynamically
/*function loadScript(src) {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = () => resolve(script);
        script.onerror = () => reject(new Error(`Failed to load script ${src}`));
        document.head.append(script);
    });
}

// Event listener for button click to load the script
document.getElementById('loadScriptButton').addEventListener('click', () => {
    loadScript('Q28external.js')
        .then(() => {
            alert('Script loaded successfully!');
        })
        .catch(error => {
            alert(`Error: ${error.message}`);
        });
});*/


// using async/await

// Function to load a script dynamically
function loadScript(src) {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = () => resolve(script);
        script.onerror = () => reject(new Error(`Failed to load script ${src}`));
        document.head.append(script);
    });
}

// Async function to handle the script loading
async function loadAndDisplayScript() {
    try {
        await loadScript('Q28external.js');
        alert('Script loaded successfully!');
    } catch (error) {
        alert(`Error: ${error.message}`);
    }
}

// Event listener for button click to load the script
document.getElementById('loadScriptButton').addEventListener('click', loadAndDisplayScript);
