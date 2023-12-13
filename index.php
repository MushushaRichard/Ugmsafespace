<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeSpace</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }
        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, textarea {
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }
        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #555;
        }
        .confirmation-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .close-btn {
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .close-btn:hover {
            background-color: #555;
        }
        nav {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .homepage-content {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .resources-content, .offer-help-section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav>
        <a href="#home">Home</a>
        <a href="#report">Report an Incident</a>
        <a href="login.html">Resources</a>
        <a href="#offer-help">Offer Help</a>
        <a href="#view-incidents">View Incidents</a>
    </nav>

    <div id="home" class="homepage-content">
        <h2>Welcome to SafeSpace</h2>
        <p>Empowering individuals and promoting a safe community for everyone.</p>
    </div>

    <main>
        <div id="report" class="report-section">
            <h2>Report an Incident</h2>
            <form id="incidentForm" action="https://docs.google.com/forms/d/e/your_google_form_id/formResponse" method="post">
                <label for="incidentType">Incident Type:</label>
                <select id="incidentType" name="incidentType" required>
                    <option value="physical">Physical Violence</option>
                    <option value="verbal">Verbal Abuse</option>
                    <option value="harassment">Harassment</option>
                    <option value="other">Other</option>
                </select>
                
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <label for="contactMethod">Preferred Contact Method:</label>
                <select id="contactMethod" name="contactMethod" required>
                    <option value="phone">Phone</option>
                    <option value="email">Email</option>
                </select>

                <label for="contactInfo">Contact Information:</label>
                <input type="text" id="contactInfo" name="contactInfo" required>

                <button type="button" onclick="submitIncident()">Submit</button>
            </form>
            <!-- Confirmation Modal -->
            <div class="confirmation-modal" id="confirmationModal">
                <div class="modal-content">
                    <p>Incident reported successfully!</p>
                    <button class="close-btn" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>

        <div id="offer-help" class="offer-help-section">
            <h2>Offer Help</h2>
            <p>If you would like to offer support or help, please contact us:</p>
            <p>Email: help@safespace.org</p>
            <p>Phone: +1 (123) 456-7890</p>
        </div>

        <div id="view-incidents" class="view-incidents-section">
            <h2>View Incidents</h2>
            <button onclick="fetchIncidents()">Load Incidents</button>
            <div id="incidentList"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 SafeSpace. All rights reserved.</p>
    </footer>

    <script>
        function submitIncident() {
            // You can add client-side validation or other actions here if needed
            document.getElementById('confirmationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        function fetchIncidents() {
            // In a real-world scenario, you would fetch incidents from a server
            // For simplicity, we'll simulate fetching from a server here
            const incidentList = document.getElementById('incidentList');
            incidentList.innerHTML = '<p>Loading incidents...</p>';

            // Simulate a delay (replace this with actual AJAX/fetch call)
            setTimeout(() => {
                // Replace this data with actual incidents retrieved from the server
                const incidentsData = [
                    { type: 'physical', location: 'City A', description: 'Incident 1 description' },
                    { type: 'verbal', location: 'City B', description: 'Incident 2 description' },
                    { type: 'harassment', location: 'City C', description: 'Incident 3 description' }
                ];

                const incidentsHTML = incidentsData.map(incident =>
                    `<div>
                        <strong>Type:</strong> ${incident.type}<br>
                        <strong>Location:</strong> ${incident.location}<br>
                        <strong>Description:</strong> ${incident.description}<br>
                        <hr>
                    </div>`
                ).join('');

                incidentList.innerHTML = incidentsHTML;
            }, 1000);
        }
    </script>
</body>
</html>
