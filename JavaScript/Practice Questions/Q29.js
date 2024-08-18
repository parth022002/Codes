// Function to return a promise that rejects after 3 seconds
function rejectAfter3Seconds() {
    return new Promise((_, reject) => {
        setTimeout(() => {
            reject(new Error('Promise rejected after 3 seconds'));
        }, 3000);
    });
}

// Async function to handle the promise using async/await
async function handlePromise() {
    try {
        await rejectAfter3Seconds();
        console.log('This will not be logged since the promise rejects.');
    } catch (error) {
        console.error('Caught an error:', error.message);
    }
}

// Call the async function
handlePromise();
