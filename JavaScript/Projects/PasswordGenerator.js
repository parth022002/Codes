class PasswordGenerator {
    constructor(length) {
        this.length = length;
        this.lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
        this.uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        this.specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        this.allChars = this.lowercaseChars + this.uppercaseChars + this.specialChars;
    }

    generate() {
        if (this.length < 6) {
            alert('Password length must be at least 6 characters.');
            return '';
        }

        let password = '';
        let charTypes = [
            this.lowercaseChars,
            this.uppercaseChars,
            this.specialChars
        ];

        // Ensure at least one character from each category
        for (let i = 0; i < charTypes.length; i++) {
            const chars = charTypes[i];
            password += chars.charAt(Math.floor(Math.random() * chars.length));
        }

        // Fill the rest of the password length with random characters
        for (let i = password.length; i < this.length; i++) {
            password += this.allChars.charAt(Math.floor(Math.random() * this.allChars.length));
        }

        return this.shuffle(password);
    }

    shuffle(password) {
        let array = password.split('');
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array.join('');
    }
}

// Function to copy the generated password to clipboard
function copyToClipboard() {
    const passwordInput = document.getElementById('generatedPassword');
    passwordInput.select();
    document.execCommand('copy');
    alert('Password copied to clipboard!');
}

// Event listener for the Generate button
document.getElementById('generateBtn').addEventListener('click', () => {
    const length = parseInt(document.getElementById('passwordLength').value, 10);
    const generator = new PasswordGenerator(length);
    const password = generator.generate();
    const passwordInput = document.getElementById('generatedPassword');
    passwordInput.value = password;
    document.getElementById('copyBtn').style.display = 'inline-block'; // Show the copy button
});

// Event listener for the Copy button
document.getElementById('copyBtn').addEventListener('click', copyToClipboard);
