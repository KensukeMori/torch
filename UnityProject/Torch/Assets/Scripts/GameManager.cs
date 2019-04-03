using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class GameManager : MonoBehaviour {

    private CameraController m_CameraController;
    [SerializeField] private GameObject m_Player;
    [SerializeField] private GameObject m_GameOverUI;
    [SerializeField] private GameObject m_GameClearUI;
    [SerializeField] private GameObject m_CountUI;
    [SerializeField] private Text m_nameText;

    //参照
    private void Awake()
    {
        m_CameraController = gameObject.GetComponent<CameraController>();
        
    }

    //UIの初期状態
    void Start () {
        m_GameOverUI.SetActive(false);
        m_GameClearUI.SetActive(false);
	}

    //ゲームオーバー時に呼び出す操作
    public void GameOver()
    {
        //俯瞰ビューに切り替え
        m_CameraController.BirdsView(); 

        //Result時に不要なオブジェクトを削除
        m_Player.SetActive(false);
        m_CountUI.SetActive(false);


        m_GameOverUI.SetActive(true);
    }

    //ゲームクリア時に呼び出す操作
    public void GameClear()
    {
        //俯瞰ビューに切り替え
        m_CameraController.BirdsView();

        //Result時に不要なオブジェクトを削除
        m_Player.SetActive(false);
        m_CountUI.SetActive(false);

        m_GameClearUI.SetActive(true);
    }

    //ゲームオーバーUIのRetryボタン押下時
    public void OnClickRetry()
    {
        SceneManager.LoadScene("TutorialStage");
    }

    //ゲームクリアUIのTitleボタン押下時
    public void OnClickToTitle()
    {
        SceneManager.LoadScene("Title");
    }

    //ゲームクリアUIのUploadボタン押下時
    public void OnClickUploadData()
    {
        //Inputに未入力の際はNo Nameを代入
        string userName = "No Name";
        if (m_nameText.text != "")
        {
            userName = m_nameText.text;
        }

        //データのアップロードを開始
        ItemDataManager itemDataManager = gameObject.GetComponent<ItemDataManager>();
        itemDataManager.UploadItemData(userName: userName);
    }

}
