const Router = require("koa-router");

const userRoutes = require("./user.routes");

const router = new Router();

router.get("/", async (ctx) => {
  ctx.body = { message: "Welcome to the Koa API!" };
});

// API Routes
const apiRouter = new Router({ prefix: "/api" });
apiRouter.use("/users", userRoutes.routes());

router.use(apiRouter.routes());

module.exports = router;
