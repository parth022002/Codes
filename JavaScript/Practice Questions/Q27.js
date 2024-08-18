// Function to add a bookmark
function addBookmark() {
    // Get site name and URL from input fields
    let siteName = document.getElementById('siteName').value;
    let siteUrl = document.getElementById('siteUrl').value;

    // Validate inputs
    if (!siteName || !siteUrl) {
        alert('Please fill in both fields');
        return;
    }

    // Create bookmark object
    let bookmark = {
        name: siteName,
        url: siteUrl
    };

    // Retrieve bookmarks from localStorage
    let bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];

    // Add the new bookmark to the array
    bookmarks.push(bookmark);

    // Save the updated bookmarks array back to localStorage
    localStorage.setItem('bookmarks', JSON.stringify(bookmarks));

    // Clear the input fields
    document.getElementById('siteName').value = '';
    document.getElementById('siteUrl').value = '';

    // Re-render the bookmarks list
    displayBookmarks();
}

// Function to display bookmarks
function displayBookmarks() {
    // Retrieve bookmarks from localStorage
    let bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];

    // Get the bookmarks list element
    let bookmarksList = document.getElementById('bookmarks');

    // Clear the list before rendering
    bookmarksList.innerHTML = '';

    // Loop through bookmarks and create list items
    bookmarks.forEach(bookmark => {
        let li = document.createElement('li');
        let link = document.createElement('a');
        link.href = bookmark.url;
        link.target = '_blank';
        link.textContent = bookmark.name;
        li.appendChild(link);
        bookmarksList.appendChild(li);
    });
}

// Display bookmarks on page load
window.onload = displayBookmarks;
