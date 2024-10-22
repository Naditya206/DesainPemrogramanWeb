document.getElementById('studentForm').addEventListener('submit', function (event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('index.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        displayStudents(data);
        this.reset(); // Reset form after submission
    });
});

function displayStudents(students) {
    const tbody = document.querySelector('#studentTable tbody');
    tbody.innerHTML = ''; // Clear previous data

    students.forEach((student, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><img src="${student.photo}" alt="Foto"></td>
            <td>${student.name}</td>
            <td>${student.class}</td>
            <td>${student.school}</td>
            <td><a href="${student.document}" target="_blank">Lihat</a></td>
            <td>
                <button onclick="deleteStudent(${index})">Hapus</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function deleteStudent(index) {
    fetch(`index.php?delete=${index}`)
    .then(response => response.json())
    .then(data => displayStudents(data));
}
