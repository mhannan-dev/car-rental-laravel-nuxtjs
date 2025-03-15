const Koa = require('koa');
const bodyParser = require('koa-bodyparser');
const logger = require('koa-logger');
const dotenv = require('dotenv');
const router = require('./routes');

dotenv.config();

const app = new Koa();

// Middleware
app.use(logger());
app.use(bodyParser());
app.use(router.routes()).use(router.allowedMethods());

module.exports = app;
