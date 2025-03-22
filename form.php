<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSA Census Form</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 30px;
            background-color: #004d99;
            color: white;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select, textarea {
            width: calc(100% - 12px); /* Adjust for padding and border */
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }


        .back-button {
            position: absolute;
            margin: 20px;
            top: 20px;
            right: 20px;
            background: dodgerblue;
            color: white;
            padding: 10px 10px;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <a href="#" class="back-button">Back</a>
</style>
</head>
<body>

    </style>
</head>
<body>

    <h1>PSA Census Form</h1>

    <form id="censusForm">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="middleName">Middle Name:</label>
        <input type="text" id="middleName" name="middleName">

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="birthDate">Date of Birth:</label>
        <input type="date" id="birthDate" name="birthDate" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        <label for="civilStatus">Civil Status:</label>
        <select id="civilStatus" name="civilStatus" required>
            <option value="">Select Civil Status</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widowed">Widowed</option>
            <option value="Divorced">Divorced</option>
        </select>

        <label for="occupation">Occupation:</label>
        <input type="text" id="occupation" name="occupation">

        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber">

        <button type="submit">Submit</button>

        <div id="message" class="message"></div>
    </form>

    <script>
        document.getElementById('censusForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = event.target;
            const formData = new FormData(form);
            const messageDiv = document.getElementById('message');

            // Simple client-side validation (can be enhanced)
            if (!formData.get('firstName') || !formData.get('lastName') || !formData.get('birthDate') || !formData.get('gender') || !formData.get('address') || !formData.get('civilStatus')) {
                messageDiv.textContent = 'Please fill in all required fields.';
                messageDiv.className = 'error';
                return;
            }

            // Simulate sending data (replace with actual API call)
            // In a real application, you'd use fetch or XMLHttpRequest to send the data.
            //Example using fetch:
            /*
            fetch('/submit-census', { // Replace '/submit-census' with your API endpoint
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageDiv.textContent = 'Census data submitted successfully!';
                    messageDiv.className = 'success';
                    form.reset(); // Clear the form
                } else {
                    messageDiv.textContent = 'Error submitting census data.';
                    messageDiv.className = 'error';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                messageDiv.textContent = 'An error occurred. Please try again.';
                messageDiv.className = 'error';
            });
            */
            //Simulated Success.
            messageDiv.textContent = 'Census data submitted successfully!';
            messageDiv.className = 'success';
            form.reset();

        });
    </script>

</body>
</html>