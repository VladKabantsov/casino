class User {

    constructor(first_name, last_name, screen_name, photo, vk_id = null, ok_id = null, referral_reference, referral_id = null) {
        this.first_name = first_name;
        this.last_name = last_name;
        this.screen_name = screen_name;
        this.photo = photo;
        this.vk_id = vk_id;
        this.ok_id = ok_id;
        this.referral_reference = referral_reference;
        this.referral_id = referral_id;
    }
}
