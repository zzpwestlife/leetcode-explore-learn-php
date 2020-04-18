<?php
/*
 * @lc app=leetcode.cn id=355 lang=php
 *
 * [355] 设计推特
 *
 * https://leetcode-cn.com/problems/design-twitter/description/
 *
 * algorithms
 * Medium (36.47%)
 * Likes:    68
 * Dislikes: 0
 * Total Accepted:    4.2K
 * Total Submissions: 10.7K
 * Testcase Example:  '["Twitter","postTweet","getNewsFeed","follow","postTweet","getNewsFeed","unfollow","getNewsFeed"]\n[[],[1,5],[1],[1,2],[2,6],[1],[1,2],[1]]'
 *
 * 
 * 设计一个简化版的推特(Twitter)，可以让用户实现发送推文，关注/取消关注其他用户，能够看见关注人（包括自己）的最近十条推文。你的设计需要支持以下的几个功能：
 * 
 */

// @lc code=start
class Twitter
{
    private $users;
    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->users = [];
    }

    /**
     * Compose a new tweet.
     * @param Integer $userId
     * @param Integer $tweetId
     * @return NULL
     */
    function postTweet($userId, $tweetId)
    {
        if (!array_key_exists($userId, $this->users)) $this->users = [$userId => new User($userId)];
        $this->users[$userId]->tweet($tweetId);
    }

    /**
     * Retrieve the 10 most recent tweet ids in the user's news feed. Each item in the news feed must be posted by users who the user followed or by the user herself. Tweets must be ordered from most recent to least recent.
     * @param Integer $userId
     * @return Integer[]
     */
    function getNewsFeed($userId)
    {
        $result = [];
        $followers = $this->users[$userId]->followers;
        if (empty($followers)) return $result;
        $pq = new SplPriorityQueue();
        // 先将所有链表的头节点添加到优先队列
        foreach ($followers as $followerId => $v) {
            $hisTweets = $this->users[$followerId]->tweets;
            if ($hisTweets !== null) $pq->insert($hisTweets, $hisTweets->timestamp);
        }

        while (!$pq->isEmpty()) {
            // 最多 10 条
            if (count($result) == 10) break;

        }
        return $result;
    }

    /**
     * Follower follows a followee. If the operation is invalid, it should be a no-op.
     * @param Integer $followerId
     * @param Integer $followeeId
     * @return NULL
     */
    function follow($followerId, $followeeId)
    {
        if (!array_key_exists($followerId, $this->users)) $this->users = [$followerId => new User($followerId)];
        if (!array_key_exists($followeeId, $this->users)) $this->users = [$followeeId => new User($followeeId)];
        $this->users[$followerId]->follow($followeeId);
    }

    /**
     * Follower unfollows a followee. If the operation is invalid, it should be a no-op.
     * @param Integer $followerId
     * @param Integer $followeeId
     * @return NULL
     */
    function unfollow($followerId, $followeeId)
    {
        if (!array_key_exists($followerId, $this->users)) $this->users = [$followerId =>  new User($followerId)];
        if (!array_key_exists($followeeId, $this->users)) $this->users = [$followeeId =>  new User($followeeId)];
        $this->users[$followerId]->unfollow($followeeId);
    }
}

class User
{
    private $id;
    public $followers;
    public $tweets;

    public function __construct($userId)
    {
        $this->id = $userId;
        $this->followers = [];
        $this->followers[$userId] = 1;
        $this->tweets = null;
    }

    public function follow($followeeId)
    {
        // 模拟 set
        $this->followers[$followeeId] = 1;
    }

    public function unfollow($followeeId)
    {
        if ($followeeId != $this->id) unset($this->followers[$followeeId]);
    }

    public function tweet($tweetId)
    {
        $newTweet = new Tweet($tweetId);
        $newTweet->next = $this->tweets;
        $this->tweets = $newTweet;
    }
}

class Tweet
{
    public $timestamp = 0;
    public $next;
    public $tweetId;
    public function __construct($tweetId)
    {
        $this->timestamp++;
        $this->next = null;
        $this->tweetId = $tweetId;
    }
}

/**
 * Your Twitter object will be instantiated and called as such:
 * $obj = Twitter();
 * $obj->postTweet($userId, $tweetId);
 * $ret_2 = $obj->getNewsFeed($userId);
 * $obj->follow($followerId, $followeeId);
 * $obj->unfollow($followerId, $followeeId);
 */
// @lc code=end
error_reporting(E_ALL);
ini_set('display_errors', 1);

$twitter = new Twitter();
// $twitter->postTweet(1, 5);
// // 用户 1 发送了一条新推文 5
// var_dump($twitter->getNewsFeed(1));
// // return [5]，因为自己是关注自己的
// $twitter->follow(1, 2);
// // 用户 1 关注了用户 2
// $twitter->postTweet(2, 6);
// // 用户2发送了一个新推文 (id = 6)
// var_dump($twitter->getNewsFeed(1));
// // return [6, 5]
// // 解释：用户 1 关注了自己和用户 2，所以返回他们的最近推文
// // 而且 6 必须在 5 之前，因为 6 是最近发送的
// $twitter->unfollow(1, 2);
// // 用户 1 取消关注了用户 2
// var_dump($twitter->getNewsFeed(1));
// // return [5]


// ["Twitter","postTweet","unfollow","getNewsFeed"]
// [[],[1,5],[1,1],[1]]
// [null,null,null,[5]]
$twitter->postTweet(1, 5);
