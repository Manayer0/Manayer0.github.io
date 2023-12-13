// Your response map with questions and answers
const responseMap = {
    "How does the reward system work": "You gain points by buying juices",
    "Where is your location": "We are located at the station janabiya",
    "Is your juice considered healthy": "Yes, our juices are considered healthy but are not low in calories",
    "What is your best seller": "Our dana juice seems to be the crowd’s favorite",
    "What time do you open": "We are open from 4pm to 2am",
    "Do you offer delivery services": "Yes, we provide delivery services within a 10-mile radius",
    "Are your juices freshly squeezed": "Yes, all our juices are freshly squeezed on-site",
    "Can I customize my juice": "Certainly! You can customize your juice by choosing from our list of fresh ingredients",
    "What payment methods do you accept": "We accept cash, credit cards, and mobile payments",
    "Do you have any vegan options": "Yes, we offer a variety of vegan-friendly juice options",
    "Are there any sugar-free options": "Yes, we have sugar-free options available for those seeking a healthier choice",
    "What is the shelf life of your juices": "Our juices are best consumed within 2-3 days for maximum freshness",
    "Can I order online": "Yes, you can place orders online through our website or mobile app",
    "Do you have any loyalty programs": "Yes, we offer a loyalty program where you can earn rewards for frequent purchases",
    "Are your juices pasteurized": "No, our juices are not pasteurized to preserve the natural flavors and nutrients",
    "Do you offer wholesale pricing": "Yes, we provide wholesale pricing for bulk orders. Contact our sales team for more information",
    "What ingredients do you use in your juices": "We use a variety of fresh fruits, vegetables, and herbs to create our delicious and nutritious juices",
    "Can I order a juice cleanse package": "Yes, we offer juice cleanse packages for those looking to detox and rejuvenate. Check our website for available options",
    "Are your juices made to order": "Yes, each juice is made to order to ensure maximum freshness and quality",
    "Do you have seating available at your location": "Yes, we have seating available for customers who prefer to enjoy their juices on-site",
    "What is the process for returning or exchanging a product": "Please refer to our return and exchange policy on our website or contact our customer service for assistance",
};

// Function to display Q&A in the HTML
function displayQandA(query) {
    const qaContainer = document.getElementById("qa-container");

    // Clear existing Q&A items
    qaContainer.innerHTML = "";

    // Loop through the response map and create HTML for matching Q&A pairs
    for (const [question, answer] of Object.entries(responseMap)) {
        const lowerCaseQuestion = question.toLowerCase();

        // Check if the query matches part of the question
        if (lowerCaseQuestion.includes(query)) {
            const qaItem = document.createElement("div");
            qaItem.classList.add("qa-item", "alert", "alert-light");
            qaItem.innerHTML = `<strong>Q: ${question}</strong><br>A: ${answer}`;
            qaContainer.appendChild(qaItem);
        }
    }

    // Display a message if no matching Q&A pairs are found
    if (qaContainer.children.length === 0) {
        const noResultsMessage = document.createElement("div");
        noResultsMessage.classList.add("qa-item", "alert", "alert-warning");
        noResultsMessage.textContent = "No matching results found.";
        qaContainer.appendChild(noResultsMessage);
    }
}

// Event listener for the search bar
document.getElementById("search-bar").addEventListener("input", function () {
    const query = this.value.toLowerCase();
    displayQandA(query);
});

// Display all Q&A items initially
displayQandA("");
