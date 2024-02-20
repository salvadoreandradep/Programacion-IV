// Function to add client
function addClient(event) {
    event.preventDefault();
    const codigo = document.getElementById('codigo').value;
    const nombre = document.getElementById('nombre').value;
    const direccion = document.getElementById('direccion').value;
    const zona = document.getElementById('zona').value;
    
    // Check if client with same code already exists in localStorage
    const existingClients = JSON.parse(localStorage.getItem('db_usss008322_usss026222_estudiante')) || [];
    const existingClient = existingClients.find(client => client.codigo === codigo);
    if (existingClient) {
      alert('El cliente con este código ya existe.');
      return;
    }
    
    // Add client to localStorage
    const newClient = { codigo, nombre, direccion, zona };
    existingClients.push(newClient);
    localStorage.setItem('db_usss008322_usss026222_estudiante', JSON.stringify(existingClients));
    
    // Update client list
    displayClientsInTable();
    
    // Clear form fields
    document.getElementById('codigo').value = '';
    document.getElementById('nombre').value = '';
    document.getElementById('direccion').value = '';
    document.getElementById('zona').value = '';
  }
  
  // Function to display clients in a table
  function displayClientsInTable() {
    const clientsTable = document.getElementById('clientesTable');
    clientsTable.innerHTML = `
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Dirección</th>
            <th scope="col">Zona</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="clientsTableBody"></tbody>
      </table>
    `;
    
    const clients = JSON.parse(localStorage.getItem('db_usss008322_usss026222_estudiante')) || [];
    const clientsTableBody = document.getElementById('clientsTableBody');
    clients.forEach(client => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${client.codigo}</td>
        <td>${client.nombre}</td>
        <td>${client.direccion}</td>
        <td>${client.zona}</td>
        <td>
          <button class="btn btn-danger" onclick="deleteClient('${client.codigo}')">Eliminar</button>
          <button class="btn btn-info" onclick="editClient('${client.codigo}')">Modificar</button>
        </td>
      `;
      clientsTableBody.appendChild(row);
    });
  }
  
  // Function to edit client
  function editClient(codigo) {
    const clients = JSON.parse(localStorage.getItem('db_usss008322_usss026222_estudiante')) || [];
    const clientToEdit = clients.find(client => client.codigo === codigo);
    if (clientToEdit) {
      // Fill form fields with client data
      document.getElementById('codigo').value = clientToEdit.codigo;
      document.getElementById('nombre').value = clientToEdit.nombre;
      document.getElementById('direccion').value = clientToEdit.direccion;
      document.getElementById('zona').value = clientToEdit.zona;
      
      // Change submit button to update button
      const submitButton = document.querySelector('#clienteForm button[type="submit"]');
      submitButton.textContent = 'Actualizar';
      submitButton.removeEventListener('click', addClient);
      submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        updateClient(clientToEdit.codigo);
      });
    }
  }
  
  // Function to update client
  function updateClient(codigo) {
    const clients = JSON.parse(localStorage.getItem('db_usss008322_usss026222_estudiante')) || [];
    const updatedClients = clients.map(client => {
      if (client.codigo === codigo) {
        client.codigo = document.getElementById('codigo').value;
        client.nombre = document.getElementById('nombre').value;
        client.direccion = document.getElementById('direccion').value;
        client.zona = document.getElementById('zona').value;
      }
      return client;
    });
    localStorage.setItem('db_usss008322_usss026222_estudiante', JSON.stringify(updatedClients));
    displayClientsInTable();
    
    // Reset form fields and submit button
    document.getElementById('clienteForm').reset();
    const submitButton = document.querySelector('#clienteForm button[type="submit"]');
    submitButton.textContent = 'Agregar';
    submitButton.removeEventListener('click', updateClient);
    submitButton.addEventListener('click', addClient);
  }
  
  // Function to delete client
  function deleteClient(codigo) {
    let clients = JSON.parse(localStorage.getItem('db_usss008322_usss026222_estudiante')) || [];
    clients = clients.filter(client => client.codigo !== codigo);
    localStorage.setItem('db_usss008322_usss026222_estudiante', JSON.stringify(clients));
    displayClientsInTable();
  }
  
  // Initialize client list on page load
  displayClientsInTable();
  
  // Event listener for form submission
  document.getElementById('clienteForm').addEventListener('submit', addClient);
  
  