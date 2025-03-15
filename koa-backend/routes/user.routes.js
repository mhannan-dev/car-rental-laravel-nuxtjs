const Router = require('koa-router');
const { getUsers, getUser } = require('../controllers/user.controller');

const router = new Router();

router.get('/', getUsers);
router.get('/:id', getUser);

module.exports = router;
