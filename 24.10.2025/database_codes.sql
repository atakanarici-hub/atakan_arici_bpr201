create table users(
	user_id int primary key auto_increment,
    username varchar(25) unique not null,
    mail varchar(255) unique not null,
    password_hash varchar(255) not null,
    display_name varchar(25) not null,
    profile_picture_path varchar(255), 
    born_date date not null,
    gender varchar(5) not null,
    bio text
)engine=InnoDB;
create table follower(
	follow_id int primary key auto_increment,
    follower_id int not null,
    following_id int not null,
    created_at timestamp default current_timestamp,
	constraint fk_follower_id foreign key(follower_id) references users(user_id) ON DELETE CASCADE,
	constraint fk_following_id foreign key(following_id) references users(user_id) ON DELETE CASCADE,
    constraint uq_follow unique (follower_id,following_id),
    index idx_following_id (following_id)
)engine=InnoDB;
create table posts(
	post_id int primary key auto_increment,
    user_id int not null,
    content text,
    media_path varchar(255),
    created_at timestamp default current_timestamp,
    constraint fk_user_id foreign key(user_id) references users(user_id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id)
)engine=InnoDB;
create table comments(
	comment_id int primary key auto_increment,
    user_id int not null,
    post_id int not null,
    content varchar(1000),
    parent_comment_id int,
    constraint fk_c_user_id foreign key(user_id) references users(user_id) ON DELETE CASCADE,
    constraint fk_c_post_id foreign key(post_id) references posts(post_id) ON DELETE CASCADE,
    constraint fk_parent_comment foreign key(parent_comment_id) references comments(comment_id) ON DELETE CASCADE,
    INDEX idx_post_id (post_id),
    INDEX idx_user_id (user_id)
)engine=InnoDB;
create table post_liked(
	liked_id int primary key auto_increment,
    user_id int not null,
    post_id int not null,
    created_at timestamp default current_timestamp,
    constraint fk_p_user_id foreign key(user_id)references users(user_id) ON DELETE CASCADE,
    constraint fk_post_id foreign key(post_id)references posts(post_id) ON DELETE CASCADE,
    unique key unique_like(user_id,post_id),
	INDEX idx_post_liked (post_id)
)engine=InnoDB;
create table conversations(
	conversation_id int primary key auto_increment,
    created_at timestamp default current_timestamp
)engine=InnoDB;
create table conversation_participants(
	participants_id int primary key auto_increment,
    conversation_id int not null,
    user_id int not null,
    constraint fk_cp_conversation_id foreign key (conversation_id) references conversations(conversation_id) ON DELETE CASCADE,
    constraint fk_cp_user_id foreign key (user_id) references users(user_id) ON DELETE CASCADE,
    unique key unique_participants(user_id,conversation_id),
    Index idx_conversation_participants(conversation_id)
)engine=InnoDB;
create table messages(
	message_id bigint primary key auto_increment,
    conversation_id int not null,
    sender_id int not null,
    content text not null,
    send_at timestamp default current_timestamp,
    constraint fk_conversation_id foreign key(conversation_id) references conversations(conversation_id) ON DELETE CASCADE,
    constraint fk_sender_id foreign key(sender_id) references users(user_id) ON DELETE CASCADE,
    INDEX idx_conversation_id (conversation_id)
)engine=InnoDB;


