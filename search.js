document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("searchForm");
    const searchButton = document.getElementById("searchButton");
    const searchResults = document.getElementById("searchResults");
    const suggestionDropdown = document.getElementById("suggestionDropdown");
    const suggestionList = document.getElementById("suggestionList");

    searchButton.addEventListener("click", function () {
        const specialist = document.getElementById("specialist").value;
        searchResults.innerHTML = "";

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                displayResults(data, specialist);
            }
        };

        xhr.open("GET", `search.php?specialist=${encodeURIComponent(specialist)}`, true);
        xhr.send();
    });

    function displayResults(results, selectedSpecialist) {
        if (results.length === 0) {
            searchResults.innerHTML = "<p>No results found.</p>";
            return;
        }

        const resultList = document.createElement("ul");
        resultList.classList.add("list-group");

        results.forEach(function (result) {
            const listItem = document.createElement("li");
            listItem.classList.add("list-group-item", "result-item");
            listItem.dataset.id = result.id;

            const image = document.createElement("img");
            image.src = result.image_url;
            image.alt = result.name;
            image.classList.add("result-image", "mr-3");

            const details = document.createElement("div");
            details.classList.add("result-details");
            details.innerHTML = `
                <h4>${result.name}</h4>
                <p>${result.address}</p>
                <p>Specialization: ${selectedSpecialist}</p>
                <button class="btn btn-primary appointment-button">Make Appointment</button>
            `;

            // Attach the appointment button event listener here
            const appointmentButton = details.querySelector(".appointment-button");
            appointmentButton.addEventListener("click", () => {
                const selectedHospitalId = result.id;
                window.location.href = `make_appointment.php?hospitalId=${selectedHospitalId}`;
            });

            listItem.appendChild(image);
            listItem.appendChild(details);

            resultList.appendChild(listItem);
        });

        searchResults.appendChild(resultList);

        const resultItems = document.querySelectorAll(".result-item");
        resultItems.forEach(item => {
            item.addEventListener("click", () => {
                resultItems.forEach(item => item.classList.remove("selected"));
                item.classList.add("selected");
            });
        });
    }

    const options = {
        includeScore: true,
        threshold: 0.4,
        keys: ['name', 'address', 'specialties']
    };

    const fuse = new Fuse([], options);

    const loadFuseIndex = () => {
        const simulatedData = [
            { id: 1, name: 'Hospital A', address: 'Address A', specialties: 'Specialty A' },
            { id: 2, name: 'Hospital B', address: 'Address B', specialties: 'Specialty B' },
        ];
        fuse.setCollection(simulatedData);
    };

    const updateSuggestions = () => {
        const specialist = document.getElementById("specialist").value;
        const searchResults = fuse.search(specialist);

        suggestionList.innerHTML = "";
        searchResults.forEach(result => {
            const suggestionItem = document.createElement("a");
            suggestionItem.classList.add("dropdown-item");
            suggestionItem.href = "#";
            suggestionItem.textContent = result.item.name;

            suggestionItem.addEventListener("click", () => {
                document.getElementById("specialist").value = result.item.name;
                suggestionList.innerHTML = "";
                suggestionDropdown.classList.remove("show");
            });

            suggestionList.appendChild(suggestionItem);
        });

        if (searchResults.length > 0) {
            suggestionDropdown.classList.add("show");
        } else {
            suggestionDropdown.classList.remove("show");
        }
    };

    loadFuseIndex();

    document.getElementById("specialist").addEventListener("input", updateSuggestions);
});
