# Wordpress Votes

A simple voting system for wordpress.

This is proof concept for a real voting system for wordpress using custom templates.
The development is in progress so many things will change in the next commits.

Any suggestion and Ideas are welcomed.

## Instalation

1. Execute the followin sql code.

```sql
 CREATE TABLE  wp_votes ( 
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    post_id mediumint(9) NOT NULL,
    vote mediumint(9) DEFAULT 0,
    UNIQUE KEY id (id)
  )
```

2. Activate the plugin

3. Use `<?php echo wp_votes_widget(); ?>` in your theme inside a the loop. 

## TODO

- Use OOP
- Implement a Caching System
- Use the voting using Redis or another no relational database.
- We want to make it fully customizable so templates and even the js should be
read from the theme.
- Write the future plans and the goals for the implementation


## Future Plans

- Create an API so anyone can built on top of this API to make whatever voting system.


## Theming: Because WP theme engine sucks, we use mustache

- Documentation: [Documentation](http://mustache.github.com/mustache.5.html)
- Repo: [Repo](https://github.com/bobthecow/mustache.php)

More info in the next commits...

## FAQ

More info in the next commits...

## Get Involve

Just Fork it and have fun coding.
