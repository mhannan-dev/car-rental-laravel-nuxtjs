exports.getUsers = async (ctx) => {
    ctx.body = { users: ['User1', 'User2', 'User3'] };
  };
  
  exports.getUser = async (ctx) => {
    const { id } = ctx.params;
    ctx.body = { user: `User ${id}` };
  };
  