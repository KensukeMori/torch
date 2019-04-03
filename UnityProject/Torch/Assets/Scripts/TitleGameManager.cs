using UnityEngine;
using UnityEngine.SceneManagement;

public class TitleGameManager : MonoBehaviour {

    //PlayerPrefsを初期化し、シーン遷移
    public void OnClickStartButton()
    {
        PlayerPrefs.DeleteAll();                
        PlayerPrefs.SetInt("sequenceId", 0);

        SceneManager.LoadScene("Test");
    }
}
