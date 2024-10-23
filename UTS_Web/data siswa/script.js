document.getElementById('studentForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    showLoading(true);

    
    const formData = new FormData(this);

    
    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            showNotification(data.error); 
        } else {
            
            updateStudentTable(data);
            showNotification('Data berhasil ditambahkan!'); 
            this.reset(); 
        }
    })
    .catch(error => console.error('Error:', error))
    .finally(() => {
        
        showLoading(false);
    });
});

// Fungsi untuk memperbarui tabel
function updateStudentTable(students) {
    const tableBody = document.getElementById('studentTable').querySelector('tbody');
    tableBody.innerHTML = ''; 

    students.forEach((student, index) => {
        const documentName = student.document.split('/').pop(); 
        const row = `
            <tr>
                <td><img src="${student.photo}" alt="Foto" width="50"></td>
                <td>${student.name}</td>
                <td>${student.class}</td>
                <td><a href="${student.document}" target="_blank">${documentName}</a></td>
                <td>
                    <button onclick="deleteStudent(${index})">Hapus</button>
                </td>
            </tr>`;
        tableBody.innerHTML += row;
    });
}

// Fungsi untuk menghapus siswa
function deleteStudent(index) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        fetch(`?delete=${index}`, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            updateStudentTable(data); 
            showNotification('Data berhasil dihapus!'); 
        })
        .catch(error => console.error('Error:', error));
    }
}

// Fungsi untuk menampilkan notifikasi
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    document.body.appendChild(notification);
    
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function showLoading(isLoading) {
    
}
