module.exports = async (ctx, next) => {
    const token = ctx.headers.authorization;
    if (!token) {
      ctx.status = 401;
      ctx.body = { error: 'Unauthorized' };
      return;
    }
    await next();
  };
  