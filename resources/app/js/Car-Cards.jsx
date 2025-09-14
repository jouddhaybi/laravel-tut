import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return <h1>Hello from React inside Laravel!</h1>;
}

const root = document.getElementById('app');
if (root) {
    ReactDOM.createRoot(root).render(<App />);
}

