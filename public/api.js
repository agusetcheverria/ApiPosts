const API_URL = 'http://localhost/apiposts';

// Función GET para obtener todos los posts
async function getPosts() {
    const response = await fetch(API_URL);
    return await response.json();
}

// Función POST para crear un nuevo post
async function createPost(postData) {
    const response = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(postData)
    });
    return await response.json();
}
