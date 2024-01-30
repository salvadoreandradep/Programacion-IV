var db;

const funedb = () => {
    let indexDB = indexedDB.open("db_sistem", 1);
    
    indexDB.onupgradeneeded = e => {
        let db = e.target.result,
            tblproducto = db.createObjectStore("producto", { keyPath: 'idproducto' });
        tblproducto.createIndex('idproducto', 'idproducto', { unique: true });
        tblproducto.createIndex('codigo', 'codigo', { unique: true });
    };

    indexDB.onsuccess = e => {
        db = e.target.result;
    };

    indexDB.onerror = e => {
        console.error("Error en IndexedDB: ", e.target.error.message);
    };
};

const abrirStore = (store, modo) => {
    if (!db) {
        console.error("La base de datos no está inicializada");
        return;
    }
    let transaction = db.transaction(store, modo);
    return transaction.objectStore(store);
};

funedb();
