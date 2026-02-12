declare namespace App.Data {
export type EventData = {
third_party_id: string;
event_name: string;
venue: string;
venue_country: string;
start_date: string | null;
poster: string | null;
};
export type FullEventData = {
id: number;
third_party_id: string;
event_name: string;
venue: string;
venue_country: string;
result: string | null;
start_date: string | null;
poster: string | null;
};
export type ResultData = {
third_party_id: string;
event_name: string;
result: string | null;
};
export type UserData = {
name: string;
email: string;
email_verified_at: string | null;
};
}
