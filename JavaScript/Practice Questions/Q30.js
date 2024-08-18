//write a javascript function which resolves a promise after n seconds. The function takes n as the parameter. Use an IIFE to execute the function with different values of n.

// Function that returns a promise which resolves after n seconds
function resolveAfterNSeconds(n) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(`Resolved after ${n} seconds`);
        }, n * 1000);
    });
}

// IIFE to execute the function with different values of n
(async function() {
    try {
        const result1 = await resolveAfterNSeconds(2);
        console.log(result1); // Logs: "Resolved after 2 seconds"

        const result2 = await resolveAfterNSeconds(5);
        console.log(result2); // Logs: "Resolved after 5 seconds"

        const result3 = await resolveAfterNSeconds(1);
        console.log(result3); // Logs: "Resolved after 1 second"
    } catch (error) {
        console.error('Error:', error);
    }
})();
