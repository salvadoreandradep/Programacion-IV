import express from 'express';
import cors from 'cors';

const app = express();
const corsOptions = {
    origin: 'http://localhost:3000/'
};
app.use(cors(corsOptions));
app.use(express.json());

export default app;